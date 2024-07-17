<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoriename' => 'required|string|max:255',
        ], [
            'categoriename.required' => 'Categorie obligatoire.',
        ]);

        $categorie = new Categorie([
            'categoriename' => $request->input('categoriename'),
        ]);

        // Enregistrement de l'image si elle est présente dans la requête
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles', 'public');
            $categorie->image = $imagePath;
        }


        $categorie->save();

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie créée avec succès` ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showSubcategories(Categorie $category)
    {
        $subcategories = $category->subcategories;
        return view('subcategorie-page.index', compact('subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $categorie = Categorie::findOrFail($id); // Find the category or throw an exception if not found
            return view('categories.edit', compact('categorie'));
        } catch (\Exception $e) {
            return redirect()->route('categories.index')
                ->with('error', 'Erreur lors de la récupération de la catégorie');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'categoriename' => 'required|string|max:255',
            ], [
                'categoriename.required' => 'Categorie obligatoire.',
            ]);

            $categorie = Categorie::findOrFail($id); // Find the category or throw an exception if not found
            $categorie->categoriename = $request->input('categoriename');

            // Enregistrement de l'image si elle est présente dans la requête
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if ($categorie->image) {
                    Storage::disk('public')->delete($categorie->image);
                }
                $imagePath = $request->file('image')->store('images/articles', 'public');
                $categorie->image = $imagePath;
            }

            // Sauvegarde de la catégorie mise à jour
            $categorie->save();

            return redirect()->route('categories.index')
                ->with('success', 'Catégorie mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')
                ->with('error', 'Erreur lors de la mise à jour de la catégorie');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $categorie = Categorie::findOrFail($id); // Cherche la catégorie ou lance une exception si elle n'est pas trouvée
            $categorie->delete(); // Supprime la catégorie

            return redirect()->route('categories.index')
                ->with('success', 'Catégorie supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')
                ->with('error', 'Erreur lors de la suppression de la catégorie');
        }
    }
}
