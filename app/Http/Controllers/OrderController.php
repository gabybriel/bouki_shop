<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::with('user', 'cartItems')->get();
        return view('orders.index', compact('commandes'));
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
    public function show(Commande $commande)
    {
        return view('orders.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commande = Commande::findOrFail($id);
        return view('orders.edit', compact('commande'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'statut' => 'required',
        ]);

        $commande = Commande::findOrFail($id);
        $ancienStatut = $commande->statut;

        $commande->statut = $request->input('statut');
        $commande->save();

        // Vérifier si le statut est mis à jour à "Payer"
        if ($ancienStatut !== 'Payer' && $commande->statut === 'Payer') {
            // Envoi de la notification WhatsApp à l'utilisateur
            $whatsappParams = [
                'token' => '',
                'to' => $commande->user->phone,
                'body' => 'Bonjour ' . $commande->user->name . ' ' . $commande->user->prenoms . ' votre paiement de ' . $commande->total . ' FCFA a été confirmé avec succès, Merci pour votre achat : https://www.boukishopping.com :'
            ];

            $whatsappUrl = 'https://api.ultramsg.com/instance71159/messages/cha';

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

            // Envoi de la notification WhatsApp à l'utilisateur
            $whatsappResponse = file_get_contents($whatsappUrl, false, $whatsappContext);
        }

        return redirect()->route('orders.index')->with('success', 'Statut de la commande mis à jour avec succès.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        try {
            // Utilisez $commande au lieu de $categorie
            $commande->delete();

            // Envoi de la notification WhatsApp a l'utilisateur
            $whatsappParams = [
                'token' => 'c92f222z41n1cezp',
                'to' => $commande->user->phone,
                'body' => 'Bonjour ' . $commande->user->name . ' ' . $commande->user->prenoms . ' votre commande a été annulée pour non-paiement. Merci de votre compréhension. - Numéro de commande: ' . $commande->num_commande . ' -  Montant total de la commande :' . $commande->total . ' FCFA : https://www.boukishopping.com',
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

            // Envoi de la notification WhatsApp a l'utilisateur
            $whatsappResponse = file_get_contents($whatsappUrl, false, $whatsappContext);

            return redirect()->route('orders.index')
                ->with('success', 'Commande supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->route('orders.index')
                ->with('error', 'Erreur lors de la suppression de la commande');
        }
    }
}
