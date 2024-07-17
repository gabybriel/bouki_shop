<?php

namespace App\Http\Controllers;

use App\Models\Whatsapp;
use App\Models\User;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whatsapps = Whatsapp::all();

        return view('whatsapp.index', compact('whatsapps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('whatsapp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'titre' => 'required',
            'message' => 'required',
        ]);

        // Récupérer le titre et le message du formulaire
        $titre = $request->input('titre');
        $message = $request->input('message');

        // Récupérer tous les utilisateurs
        $users = User::all();

        // Enregistrer le message dans la base de données
        $whatsapp = Whatsapp::create([
            'titre' => $titre,
            'message' => $message,
        ]);

        // Envoyer le message à tous les utilisateurs
        foreach ($users as $user) {
            if ($user->phone) {
                $whatsappParams = [
                    'token' => 'c92f222z41n1cezp',
                    'to' => $user->phone,
                    'body' => '*'. $titre . '*'. "\n\n".''
                        . $message. "\n\n".

                        'Merci !'. "\n\n".
                        'https://www.boukishopping.com',
                ];
                $whatsappUrl = 'https://api.ultramsg.com/instance71159/messages/chat';

                $whatsappContext = stream_context_create([
                    'http' => [
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                        'content' => http_build_query($whatsappParams),
                    ],
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ]);

                // Envoi de la notification WhatsApp au marchand
                file_get_contents($whatsappUrl, false, $whatsappContext);
            }
        }

        // Rediriger vers l'index avec un message de succès
        return redirect()->route('whatsapp.index')->with('success', 'Message envoyé à tous les utilisateurs avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $whatsapp = Whatsapp::findOrFail($id);

        return view('whatsapp.show', compact('whatsapp'));
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
        $whatsapp = Whatsapp::findOrFail($id);
        $whatsapp->delete();

        return redirect()->route('whatsapp.index')->with('success', 'Le Message à été supprimer');
    }
}
