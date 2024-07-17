<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CommandeListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Récupération de l'utilisateur authentifié
    $user = Auth()->user();
    $commande = Commande::orderBy('created_at', 'desc')->get();
    $commandes = Commande::with('cartItems')->get();

    // Récupération des commandes de l'utilisateur authentifié
    $commandes = $user->commandes;

    return view('commandelist', compact('commandes', 'commande', 'commandes'));
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
