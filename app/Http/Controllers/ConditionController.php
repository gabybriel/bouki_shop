<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conditions = Condition::all();
        return view('conditions.index', compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $condition = new Condition([
            'cgv' => $request->input('cgv'),
        ]);

        $condition->save();

        return redirect()->route('conditions.index')
            ->with('success', 'Conditions générales de vente créées avec succès.');
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
        try {
            $condition = Condition::findOrFail($id); // Find the category or throw an exception if not found
            return view('conditions.edit', compact('condition'));
        } catch (\Exception $e) {
            return redirect()->route('conditions.index')
                ->with('error', 'Erreur lors de la récupération de la condition');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $condition = Condition::findOrFail($id);

            $this->validate($request, [
                'cgv' => 'required|string',
            ]);

            // Mise à jour des données de la condition
            $condition->update([
                'cgv' => $request->input('cgv'),
            ]);

            return redirect()->route('conditions.index')->with('success', 'Condition mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->route('conditions.index')->with('error', 'Erreur lors de la mise à jour de la condition');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
