<?php

namespace App\Http\Controllers;

use App\Mail\StockAlert;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Article;
use App\Models\ArticleVariant;
use App\Models\User;
use App\Models\CartItem;
use App\Models\ProductVariant;
use App\Models\Variant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Providers\ArtisanServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'modepaiement' => 'required|string',
        ], [
            'adresse.required' => 'L\'adresse est obligatoire.',
            'ville.required' => 'La ville est obligatoire.',
            'modepaiement.required' => 'Le mode de paiement est obligatoire.',
        ]);

        // Génération du numéro de commande aléatoire
        $numCommande = rand(10000, 99990);

        // Calculer le montant total
        $montantSansFrais = 0;

        foreach (Cart::content() as $product) {
            $prix = $product->price;
            $quantite = $product->qty;
            $reduction = $product->model->is_promo / 100; // Convertir en pourcentage
            $prixReduit = $product->model->is_promo ? $prix * (1 - $reduction) : $prix;
            $montantSansFrais += $prixReduit * $quantite;
        }

        // Calculer les frais (3.5% du montant total)
        $frais = round(($montantSansFrais * 3.5) / 100);

        // Calculer le montant total avec les frais
        $montantTotal = round($montantSansFrais + $frais);

        // Récupération de l'utilisateur authentifié
        $username = Auth()->user();

        // Création de la commande
        $commande = new Commande();
        $commande->num_commande = $numCommande;
        $commande->adresse = $request->input('adresse');
        $commande->ville = $request->input('ville');
        $commande->modepaiement = $request->input('modepaiement');
        $commande->num_momo = $request->input('num_momo');
        $commande->total = $montantTotal;
        $commande->user_id = $username->id;
        $commande->save();

        // Décrémentation de la quantité des articles et gestion des stocks
        foreach (Cart::content() as $cartItem) {
            $article = Article::find($cartItem->id);
            if ($article) {
                if ($article->quantity >= $cartItem->qty) {
                    $article->quantity -= $cartItem->qty;
                    $article->save();

                    // Créer une entrée dans la table CartItem
                    CartItem::create([
                        'commande_id' => $commande->id,
                        'article_id' => $cartItem->id,
                        'quantity' => $cartItem->qty,
                        'price' => $cartItem->price,
                    ]);

                    // Envoyer la notification WhatsApp au marchand si l'article appartient à un marchand
                    if ($article->user && $article->user->is_vendor) {
                        $merchant = $article->user;
                        $whatsappParams = [
                            'token' => 'c92f222z41n1cezp',
                            'to' => $merchant->phone,
                            'body' => 'Nouvelle commande pour votre article *' . $article->titre . '*' . "\n" .
                                'Numéro de commande: *' . $numCommande . '*' . "\n" .
                                'Taille: *' . $article->taille . 'Quantité: ' . $cartItem->qty . '*' . "\n" .
                                'Veuillez préparer l\'article pour la livraison' . "\n\n" .
                                'https://www.boukishopping.com',
                        ];
                        $whatsappUrl = 'https://api.ultramsg.com/instance71159/messages/chat';

                        $whatsappContext = stream_context_create([
                            'http' => [
                                'method' => 'POST',
                                'header' => 'Content-type: application/x-www-form-urlencoded',
                                'content' => http_build_query($whatsappParams),
                            ],
                            'ssl' => [
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                            ],
                        ]);

                        // Envoi de la notification WhatsApp au marchand
                        file_get_contents($whatsappUrl, false, $whatsappContext);
                    }
                } else {
                    // Gérer le cas où la quantité commandée est supérieure à la quantité disponible
                    session()->flash('error', "La quantité demandée pour l'article {$article->name} n'est pas disponible.");
                    Cart::update($cartItem->rowId, $article->quantity);
                }
            } else {
                // Gérer le cas où l'article associé au panier n'est pas trouvé
                session()->flash('error', "L'article avec l'ID {$cartItem->id} n'a pas été trouvé.");
                Cart::remove($cartItem->rowId);
            }
        }

        // Envoi de la notification WhatsApp à l'administrateur
        $adminWhatsappParams = [
            'token' => 'c92f222z41n1cezp',
            'to' => '+242065860906',
            'body' => 'Nouvelle commande de *' . $commande->user->prenoms . ' ' . $commande->user->name . '* ' . "\n" .
                ' - Numéro de commande: *' . $numCommande . '*' . "\n\n" .
                ' https://www.boukishopping.com',
        ];

        $whatsappUrl = 'https://api.ultramsg.com/instance71159/messages/chat';

        $whatsappContext = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($adminWhatsappParams),
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        file_get_contents($whatsappUrl, false, $whatsappContext);

        // Envoi de la notification WhatsApp à l'utilisateur
        $userWhatsappParams = [
            'token' => 'c92f222z41n1cezp',
            'to' => $commande->user->phone,
            'body' => 'Bonjour ! ' . $commande->user->name . ",\n" .
                'Votre commande ' . $numCommande . ' est en attente de paiement.' . "\n" .
                'Montant total : ' . $commande->total . ' FCFA.' . "\n\n" .
                'Avant de valider votre commande, prière de régler le montant correspondant par transfert Mobile Money : ' . "\n" .
                'MTN -> 06 888 2038' . "\n" .
                'AIRTEL -> 05 627 3325' . "\n\n" .
                'Merci !' . "\n" .
                'https://www.boukishopping.com',
        ];

        $whatsappContext = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($userWhatsappParams),
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        file_get_contents($whatsappUrl, false, $whatsappContext);

        // Destruction du panier après la validation de la commande
        Cart::destroy();

        // Message de succès
        $successMessage = "Votre paiement a été effectué avec succès.";
        return redirect()->route('welcome')->with('success', $successMessage);
    }
}
