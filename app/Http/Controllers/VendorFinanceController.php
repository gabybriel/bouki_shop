<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Finance;
use Illuminate\Http\Request;

class VendorFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $finances = Finance::with('user')->get();
        return view('finances.vendors.index', compact('finances'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendeur = auth()->user();
        $articlesVendeur = $vendeur->articles->pluck('id');

        $commandes = Commande::with('cartItems')
            ->whereHas('cartItems', function ($query) use ($articlesVendeur) {
                $query->whereIn('article_id', $articlesVendeur);
            })
            ->where('statut', 'Payer')
            ->get();

        $totalSum = $commandes->reduce(function ($carry, $commande) use ($articlesVendeur) {
            $sum = $commande->cartItems->whereIn('article_id', $articlesVendeur)->sum('price');
            return $carry + $sum;
        }, 0);

        // Soustraction des retraits "effectués" du totalSum
        $retraitsEffectues = Finance::where('user_id', $vendeur->id)
            ->where('statut', 'Effectué')
            ->sum('somme');

        $totalSum -= $retraitsEffectues;
        return view('finances.vendors.create', compact('totalSum'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vendeur = auth()->user();
        $request->validate([
            'somme' => 'required|numeric',
        ], [
            'somme.required' => 'Quelle est la somme que vous souhaitez retirer ?',
        ]);

        // Crée un enregistrement de retrait avec le statut "En atente"
        $retrait = new Finance([
            'user_id' =>$vendeur->id,
            'somme' => $request->input('somme'),
            'statut' => 'En attente',
        ]);
        $retrait->save();

        if ($retrait->user->is_vendor) {
            $vendeur = $retrait->user;
            $whatsappParams = [
                'token' => 'c92f222z41n1cezp',
                'to' => $vendeur->phone,
                'body' => '*Votre retrait est En attente*'."\n\n".
                    'Merci de Patienter' ."\n".
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


        // Envoi de la notification WhatsApp a l'administrateur
        if ($retrait) {
            $whatsappParams = [
                'token' => 'c92f222z41n1cezp',
                'to' => +'242065860906',
                'body' => '*Vous avez un nouveau retrait en atente*'."\n\n".
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

            // Envoi de la notification WhatsApp a l'administrateur
            file_get_contents($whatsappUrl, false, $whatsappContext);
        }

        return redirect()->route('vendor-dashboard')->with('success', 'Retrait initier avec success !');
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
        //
    }
}
