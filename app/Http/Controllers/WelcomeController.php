<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\CartItem;
use App\Models\PostView;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $id)
    {

        $articleCount = Article::count();
        $article = Article::all();
        $articles = Article::paginate(10);
        // Suppose you want to associate the views with a specific post (replace 1 with the actual post_id)
        $postId = 1;

        // Créer une nouvelle instance de PostView avec le post_id spécifié
        $newView = new PostView(['post_id' => $postId]);

        // Incrémenter le nombre de vues de la nouvelle instance
        $newView->views_count++;

        // Enregistrer la nouvelle instance dans la base de données
        $newView->save();

        $categories = Categorie::all();
        $sliders = Slider::all();

        // Filtrer les articles où le statut n'est pas égal à "Brouillon" et qui n'ont pas encore été commandés
        $articles = Article::with('categorie')
            ->where('statut', '!=', 'Brouillon')

            ->orderBy('created_at', 'desc') // Ajout de l'ordre décroissant par date de création
            ->paginate(12);

        return view('welcome', compact('articles', 'article', 'categories', 'sliders', 'articleCount'));
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
        // Retrieve all categories
        $categories = Categorie::all();
        $articleCount = Article::count();

        // Find the article by ID
        $article = Article::findOrFail($id);
        $articles = Article::all();
        $users = User::where('is_vendor', true)->select('shopname')->get();

// Check if the article is published (not in draft status)
        if ($article->statut !== 'Brouillon') {
            return view('details', compact('article', 'articles', 'categories', 'users'));
        }

        // Article is either a draft or associated with an active order
        return redirect()->route('welcome.index')->with('error', 'Article not found or unavailable.');
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
