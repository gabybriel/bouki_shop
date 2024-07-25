<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Finance;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\PostView;

class VendorDashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupération de l'utilisateur connecté (supposé être un vendeur)
        $vendeur = auth()->user();
        // Récupération des IDs des articles appartenant au vendeur
        $articlesVendeur = $vendeur->articles->pluck('id');

        // Initialisation des variables
        $totalSum = 0;
        $commission = 0;
        $mesCommissions = 0;

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
                    $commission = $cartItem->commission ?? 0;
                    $priceAfterCommission = $cartItem->price * (1 - $cartItem->commission / 100);
                    $totalSum += $priceAfterCommission;
                }
            }
        }

        // Récupération du total des retraits effectués par le vendeur
        $retraitsEffectues = Finance::where('user_id', $vendeur->id)
            ->where('statut', 'Effectué')
            ->sum('somme');

        // Soustraction des retraits effectués du total calculé
        $totalSum -= $retraitsEffectues;

        // Récupération des vues de la page d'accueil pour aujourd'hui et ce mois-ci
        $vuesDuJour = PostView::whereDate('created_at', today())
            ->where('post_id', 1) // Remplacez 1 par l'ID réel du post
            ->sum('views_count');

        $vuesDuMois = PostView::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->where('post_id', 1) // Remplacez 1 par l'ID réel du post
            ->sum('views_count');

        return view('vendor-dashboard', compact('commandes', 'totalSum', 'commission', 'vuesDuJour', 'vuesDuMois', 'articlesVendeur', 'retraitsEffectues', 'mesCommissions'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $articleIds = $request->input('article_ids');

        // Mettez à jour le statut des articles sélectionnés
        Article::whereIn('id', $articleIds)->update(['statut' => 'En ligne']);

        return response()->json(['message' => 'Statut mis à jour avec succès.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
