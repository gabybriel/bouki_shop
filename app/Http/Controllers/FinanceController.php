<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\User;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finances = Finance::with('user')->get();
        return view('finances.index', compact('finances'));
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
        $finance = Finance::findOrFail($id);
        return view('finances.edit', compact('finance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'statut' => 'required|string',
        ]);

        $finance = Finance::findOrFail($id);

        // Mettre à jour les données de la table finances
        $finance->statut = $request->input('statut');;
        $finance->save();
        return redirect()->route('finances.index')->with('success', 'Statut mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
