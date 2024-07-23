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
        $vendeur = auth()->user(); // Supposons que l'utilisateur connecté est un vendeur
        $articlesVendeur = $vendeur->articles->pluck('id'); // Récupérer les IDs des articles du vendeur
        $totalSum = 0;
        $commissions = [];

        $commandes = Commande::with('cartItems')
            ->whereHas('cartItems', function ($query) use ($articlesVendeur) {
                $query->whereIn('article_id', $articlesVendeur);
            })
            ->where('statut', 'Payer')
            ->get();

        // Calculer le total du jour pour le vendeur
        $totalSum = $commandes->sum(function ($commande) use ($articlesVendeur) {
            return $commande->cartItems->whereIn('article_id', $articlesVendeur)->sum(function ($cartItem) {
                $commission = $cartItem->article->commission ?? 0;
                $priceAfterCommission = $cartItem->price * (1 - $commission / 100);
                $commissions[] = $commission;
                return $priceAfterCommission;
            });
        }, 0);

        // Soustraction des retraits "effectués" du totalSum
        $retraitsEffectues = Finance::where('user_id', $vendeur->id)
            ->where('statut', 'Effectué')
            ->sum('somme');

        $totalSum -= $retraitsEffectues;


        // Récupérer les vues de la page d'accueil créées aujourd'hui
        $vuesDuJour = PostView::whereDate('created_at', today())
            ->where('post_id', 1) // Remplacez 1 par l'ID réel du post
            ->sum('views_count');

        // Récupérer les vues de la page d'accueil créées ce mois-ci
        $vuesDuMois = PostView::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->where('post_id', 1) // Remplacez 1 par l'ID réel du post
            ->sum('views_count');

        // Récupérer toutes les commandes payées pour les articles du vendeur
        $commandes = Commande::with('cartItems')->whereHas('cartItems', function ($query) use ($articlesVendeur) {
            $query->whereIn('article_id', $articlesVendeur);
        })->get();

        return view('vendor-dashboard', compact('commandes', 'totalSum',   'vuesDuJour', 'vuesDuMois'));
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
