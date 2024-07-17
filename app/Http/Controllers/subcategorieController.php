<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class subcategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        $subcategories = SubCategory::with('categorie')->get();
        return view('subcategories.index', compact('subcategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sous_categorie' => 'required|string|max:255',
            'categorie_id' => 'required|string|max:255',
        ], [
            'sous_categorie.required' => 'Sous-categorie obligatoire.',
            'categorie_id.required' => 'Categorie obligatoire.',
        ]);

        $subcategorie = new SubCategory([
            'subcategoryname' => $request->input('sous_categorie'),
            'categorie_id' => $request->input('categorie_id'),
        ]);

        // Enregistrement de l'image si elle est présente dans la requête
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles', 'public');
            $subcategorie->image = $imagePath;
        }


        $subcategorie->save();

        return redirect()->route('sous-categories.index')
            ->with('success', 'Sous-catégorie créée avec succès` ');
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
        $subcategorie = SubCategory::findOrFail($id); // Cherche la catégorie ou lance une exception si elle n'est pas trouvée
        $subcategorie->delete(); // Supprime la catégorie

        return redirect()->route('sous-categories.index')
            ->with('success', 'Sous catégorie supprimée avec succès');
    }
}
