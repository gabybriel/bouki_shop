<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;




class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        $articles = Article::with('categorie')->get();

        return view('panier', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        $articles = Article::with('categorie')->get();
        return view('commander', compact('articles', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider la requête entrante
        $request->validate([
            'product_id' => 'required|integer|exists:articles,id',
        ]);

        // Rechercher des articles en double dans le panier
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->product_id;
        });

        // Si l'article existe déjà dans le panier, rediriger avec un message d'erreur
        if ($duplicata->isNotEmpty()) {
            return redirect()->route('welcome')->with('error', '🙄  L\'article ajouté existe déjà dans votre panier');
        }

        // Trouver le produit par ID
        $product = Article::find($request->product_id);

        // Vérifier si le produit a été trouvé
        if (!$product) {
            return redirect()->route('welcome')->with('error', 'Produit non trouvé');
        }

        // Ajouter le produit au panier
        Cart::add($product->id, $product->titre, 1, $product->prix)
            ->associate('App\Models\Article');

        // Rediriger vers l'index du panier avec un message de succès
        return redirect()->route('cart.index')->with('success', 'L\'article a bien été ajouté au panier');
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
    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->quantity);

        $cartTotal = Cart::subtotal();


        return response()->json(['cartTotal' => $cartTotal]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $rowId)
    {
        Cart::remove($rowId);

        return back()->with('success', 'L\'article a bien été supprimé avec succès');
    }
}
