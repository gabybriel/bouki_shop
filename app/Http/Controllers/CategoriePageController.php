<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\CartItem;
use App\Models\Categorie;
use App\Models\SubCategory;

class CategoriePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function show(Request $request)
    {
        // Récupérer l'ID de la catégorie et de la sous-catégorie à filtrer, s'ils sont présents
        $categoryId = $request->input('category_id');
        $subCategoryId = $request->input('subcategory_id');

        // Construire la requête de base pour les articles
        $query = Article::where('statut', '!=', 'Brouillon')
            ->where(function ($query) {
                $query->whereDoesntHave('cartItems.commande')
                    ->orWhereHas('cartItems.commande', function ($query) {
                        $query->whereIn('statut', ["Annuler"]);
                    });
            });

        // Appliquer le filtre de catégorie s'il est présent
        if ($categoryId) {
            $query->where('categorie_id', $categoryId);
        }

        // Appliquer le filtre de sous-catégorie s'il est présent
        if ($subCategoryId) {
            $query->where('subcategorie_id', $subCategoryId);
        }

        // Compter les articles
        $articleCount = $query->count();

        // Récupérer les articles avec la pagination
        $articles = $query->paginate(12);

        // Récupérer toutes les catégories
        $categories = Categorie::all();

        // Récupérer toutes les sous-catégories
        $subcategories = SubCategory::all();

        // Retourner la vue avec les données nécessaires
        return view('categoriepage', compact('articles', 'categories', 'subcategories', 'articleCount', 'categoryId', 'subCategoryId'));
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
