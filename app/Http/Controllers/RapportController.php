<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\User;
use App\Models\CartItem;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = Commande::with('user', 'cartItems')->where('statut', 'Payer');

        // Filtrer par date si les dates sont fournies
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59']);
        }

        // Calculer le total des commandes filtrées en utilisant le total des cartItems
        $totalCommandes = $query->get()->sum(function ($commande) {
            return $commande->cartItems->sum('price');
        });

        $commandes = $query->get();

        return view('rapports.index', compact('commandes', 'totalCommandes'));
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
