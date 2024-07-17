<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        $sliders = Slider::orderBy('created_at', 'desc')->get();
        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'image.required' => 'Veuillez sélectionner une image.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'Le fichier doit être de type :jpeg, :png, :jpg, :gif ou :svg.',
            'image.max' => 'L\'image ne doit pas dépasser 1048 kilo-octets.',
        ]);

        $slider = new Slider([
            'position' => $request->input('position'),
        ]);

        // Enregistrement de l'image si elle est présente dans la requête
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles', 'public');
            $slider->image = $imagePath;
        }

        $slider->save();

        // Redirection ou autre logique après la sauvegarde
        return redirect()->route('slider-config.index')->with('success', 'Slider ajouté avec succès!');
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
        $sliders = Slider::findOrFail($id);

        return view('sliders.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'nullable',
        ], [
            'image.required' => 'Veuillez sélectionner une image.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'Le fichier doit être de type :jpeg, :png, :jpg, :gif ou :svg.',
            'image.max' => 'L\'image ne doit pas dépasser 2048 kilo-octets.', // Correction de la limite de taille
        ]);

        // Récupérer le slider existant
        $slider = Slider::findOrFail($id);

        // Mettre à jour la position
        $slider->position = $request->input('position');

        // Enregistrement de l'image si elle est présente dans la requête
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }

            // Enregistrer la nouvelle image
            $imagePath = $request->file('image')->store('images/articles', 'public');
            $slider->image = $imagePath;
        }

        // Sauvegarder les modifications
        $slider->save();

        return redirect()->route('slider-config.index')->with('success', 'Slide mis à jour avec succès!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id); // Cherche l'article ou lance une exception si elle n'est pas trouvée
        $slider->delete(); // Supprime l'article

        return redirect()->route('slider-config.index')
            ->with('success', 'Slider supprimée avec succès');
    }
}
