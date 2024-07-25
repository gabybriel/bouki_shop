<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class VendorAllController extends Controller
{
    // Affiche toutes les commandes contenant des articles du vendeur connecté
    public function index()
    {
        $vendeur = Auth::user();

        $commandes = Commande::whereHas('cartItems.article', function ($query) use ($vendeur) {
            $query->where('user_id', $vendeur->id);
        })
            ->with(['user', 'cartItems.article'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.vendors.index', compact('commandes'));
    }

    // Affiche les détails d'une commande spécifique
    public function show()
    {
        $finances = Finance::all();
        return view('marchands.show', compact('finances'));
    }

    // Affiche la page de finance du vendeur avec le montant total, les retraits en attente, approuvés et disponibles
    // Affiche le portefeuille du vendeur
    public function create()
    {
        $vendeur = auth()->user();
        $articlesVendeur = $vendeur->articles->pluck('id');
        $totalSum = 0;

        // Récupération des commandes contenant les articles du vendeur et ayant le statut 'Payer'
        $commandes = Commande::with('cartItems')
            ->whereHas('cartItems', function ($query) use ($articlesVendeur) {
                $query->whereIn('article_id', $articlesVendeur);
            })
            ->where('statut', 'Payer')
            ->get();

        // Calcul du total après soustraction des commissions
        foreach ($commandes as $commande) {
            foreach ($commande->cartItems as $cartItem) {
                if (in_array($cartItem->article_id, $articlesVendeur->toArray())) {
                    $commission = $cartItem->article->commission ?? 0;
                    $priceAfterCommission = $cartItem->price * (1 - $cartItem->commission / 100);
                    $totalSum += $priceAfterCommission;
                }
            }
        }

        // Soustraction des retraits "effectués" du totalSum
        $retraitsEffectues = Finance::where('user_id', $vendeur->id)
            ->where('statut', 'Effectué')
            ->sum('somme');

        $totalSum -= $retraitsEffectues;
        return view('finances.vendors.create', compact('totalSum'));
    }

    // Gère la demande de retrait du vendeur
    public function store(Request $request)
    {
        $vendeur = auth()->user();
        $request->validate([
            'somme' => 'required|numeric',
        ], [
            'somme.required' => 'Quelle est la somme que vous souhaitez retirer ?',
        ]);

        // Crée un enregistrement de retrait avec le statut "En atente"
        $retrait = new Finance([
            'user_id' => $vendeur->id,
            'somme' => $request->input('somme'),
            'mode' => $request->input('mode'),
            'phone' => $request->input('phone'),
            'statut' => 'En attente',
        ]);
        $retrait->save();

        if ($retrait->user->is_vendor) {
            $vendeur = $retrait->user;
            $whatsappParams = [
                'token' => 'c92f222z41n1cezp',
                'to' => $vendeur->phone,
                'body' => '*Votre retrait est En attente*' . "\n\n" .
                    'Merci de Patienter' . "\n" .
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


        // Envoi de la notification WhatsApp a l'administrateur
        if ($retrait) {
            $whatsappParams = [
                'token' => 'c92f222z41n1cezp',
                'to' => +'242065860906',
                'body' => '*Vous avez un nouveau retrait en atente*' . "\n\n" .
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

            // Envoi de la notification WhatsApp a l'administrateur
            file_get_contents($whatsappUrl, false, $whatsappContext);
        }

        return redirect()->route('vendor-dashboard')->with('success', 'Retrait initier avec success !');
    }
}
