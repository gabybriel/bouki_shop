<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\PostView;
use App\Models\User;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer les commandes payées créées aujourd'hui
        $commandesDuJour = Commande::with('user', 'cartItems')
            ->whereDate('created_at', today())
            ->where('statut', 'Payer')
            ->get();

        // Calculer le total du jour
        $totalDuJour = $commandesDuJour->sum(function ($commande) {
            return $commande->cartItems->sum('price');
        });

        // Récupérer les commandes payées créées ce mois-ci
        $commandesDuMois = Commande::with('user', 'cartItems')
            ->where('statut', 'Payer')
            ->get();

        // Calculer le total du mois
        $totalDuMois = $commandesDuMois->sum(function ($commande) {
            return $commande->cartItems->sum('price');
        });

        // Récupérer les vues de la page d'accueil créées aujourd'hui
        $vuesDuJour = PostView::whereDate('created_at', today())
            ->where('post_id', 1) // Remplacez 1 par l'ID réel du post
            ->sum('views_count');

        // Récupérer les vues de la page d'accueil créées ce mois-ci
        $vuesDuMois = PostView::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->where('post_id', 1) // Remplacez 1 par l'ID réel du post
            ->sum('views_count');

        // Récupérer toutes les commandes (payées ou non)
        $commandes = Commande::all();


        $vendeurs = User::where('is_vendor', true)->get();
        // Récupérer les IDs des articles appartenant aux vendeurs
        $articlesVendeur = collect();
        foreach ($vendeurs as $vendeur) {
            $articlesVendeur = $articlesVendeur->merge($vendeur->articles->pluck('id'));
        }

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
                    $mesCommission = $cartItem->price * ($cartItem->commission / 100);
                    $mesCommissions += $mesCommission;
                    $totalSum += $priceAfterCommission;
                }
            }
        }

        return view('admin-dashboard', compact('commandes', 'commandesDuJour', 'totalDuJour', 'commandesDuMois', 'totalDuMois', 'vuesDuJour', 'vuesDuMois', 'mesCommissions'));
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
        //
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
