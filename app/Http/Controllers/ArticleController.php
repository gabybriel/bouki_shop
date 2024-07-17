<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Categorie::all();
        // Récupérer tous les articles qui n'ont pas de commande associée et pas de cartItems associés à une commande
        $articles = Article::all();

        return view('articles.index', compact('articles', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        $subcategories = SubCategory::all(); // Fetch all categories

        // Récupérez l'ID de la dernière catégorie sélectionnée depuis la session
        $lastSelectedCategory = session()->get('last_selected_category', null);

        $users = User::where('is_vendor', true)->get();

        return view('articles.create', compact('users', 'categories', 'subcategories', 'lastSelectedCategory'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'taille' => 'string',
            'numero' => 'required|string',
            'prix' => 'nullable|numeric',
            'user_id' => 'nullable|exists:users,id',
            'subcategorie_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'numero.required' => 'Veuillez entrer le numéro de votre article.',
            'prix.required' => 'Veuillez entrer le prix de votre article.',
            'subcategorie_id.required' => 'Veuillez sélectionner la catégorie de votre article.',
            'image.required' => 'Veuillez sélectionner une image pour votre article.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'Le fichier doit être de type :jpeg, :png, :jpg, :gif ou :svg.',
            'image.max' => 'L\'image ne doit pas dépasser 2048 kilo-octets.',
        ]);

        // Création d'une nouvelle instance d'article avec les données validées
        $article = new Article([
            'titre' => $request->input('titre'),
            'taille' => $request->input('taille'),
            'numero' => $request->input('numero'),
            'prix' => $request->input('prix'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
            'commission' => $request->input('commission'),
            'statut' => $request->input('statut'),
            'user_id' => $request->input('user_id'),
            'categorie_id' => $request->input('categorie_id'),
            'subcategorie_id' => $request->input('subcategorie_id'),
            'is_promo' => $request->input('is_promo'),
        ]);

        // Enregistrement de l'image si elle est présente dans la requête
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles', 'public');
            $article->image = $imagePath;
        }

        // Enregistrement des images multiple si elles sont présentes dans la requête
        if ($request->hasFile('images')) {
            $cheminsImages = [];

            foreach ($request->file('images') as $fichier) {
                $cheminImage = $fichier->store('images/articles', 'public');
                $cheminsImages[] = $cheminImage;
            }

            // Convertir le tableau d'images en une chaîne JSON
            $article->images = json_encode($cheminsImages);
        }




        // Sauvegarde de l'article dans la base de données
        $article->save();

        // Stockez l'ID de la dernière catégorie sélectionnée dans la session
        session()->put('last_selected_category', $article->categorie_id);

        // Redirection ou autre logique après la sauvegarde
        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès!');
    }

    /**
     * Update Article statut.
     */
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
        // Récupération de l'article ou renvoi d'une erreur 404 si non trouvé
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Récupérer l'article à éditer
        $article = Article::findOrFail($id);
        $articles = Article::all();
        $subcategories = SubCategory::all();
        $categories = Categorie::all(); // Fetch all categories
        $users = User::where('is_vendor', true)->get();
        $lastSelectedCategory = session()->get('last_selected_category');



        return view('articles.edit', compact('article', 'articles', 'categories', 'users', 'subcategories', 'lastSelectedCategory',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'numero' => 'string',
            'prix' => 'required|numeric',
            'user_id' => 'nullable|exists:users,id',
            'commission' => 'nullable|numeric'
        ], [
            'numero.required' => 'Veuillez entrer le numéro de votre article.',
            'prix.required' => 'Veuillez entrer le prix de votre article.',
        ]);

        // Récupérer l'article à mettre à jour
        $article = Article::findOrFail($id);

        // Mettre à jour les données de l'article
        $article->update($request->all());


        // Sauvegarde de l'article mis à jour dans la base de données
        $article->save();
        // Redirection ou autre logique après la mise à jour
        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $article = Article::findOrFail($id); // Cherche l'article ou lance une exception si elle n'est pas trouvée
            $article->delete(); // Supprime l'article

            return redirect()->route('articles.index')
                ->with('success', 'Article supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->route('articles.index')
                ->with('error', 'Erreur lors de la suppression de l\'article');
        }
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::where('titre', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhere('subcategorie_id', 'LIKE', "%{$query}%")
            ->get();
        return view('search.results', compact('articles', 'query'));
    }
}
