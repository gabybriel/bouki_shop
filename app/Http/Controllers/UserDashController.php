<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Article;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer les commandes de l'utilisateur actuellement connecté avec les relations
        $commandes = auth()->user()->commandes()->with('user', 'cartItems')->get();

        // Retourner la vue avec les commandes de l'utilisateur actuel
        return view('dashboard', compact('commandes'));
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
        $user = Auth::user();
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required|string',
            'prenoms' => 'required|string',
            'phone' => 'nullable|unique:users,phone,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
            // Add validation rules for other fields as needed
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $validatedData = $request->validate($rules);

        $user->update([
            'email' => $request->input('email'),
        ]);

        // Manually hash the password if it is present in the request
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);


        return redirect()->route('dashboard')->with('success', 'Variant updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
