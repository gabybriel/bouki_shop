<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'prenoms' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Créer l'utilisateur
        $user = User::create([
            'name' => $input['name'],
            'prenoms' => $input['prenoms'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);


        // Envoi de la notification WhatsApp a l'Administrateur
        $whatsappParams = [
            'token' => 'c92f222z41n1cezp',
            'to' => '+242068882038', // Numéro de téléphone pour la notification WhatsApp
            'body' => 'Nouvel utilisateur enregistré - Nom: ' . $input['name'] . ' ' . $input['prenoms'] . ', Téléphone: ' . $input['phone'],
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

        // Envoi de la notification WhatsApp
        $whatsappResponse = file_get_contents($whatsappUrl, false, $whatsappContext);

        // Envoi de la notification WhatsApp a l'Utilisateur
        $whatsappParams = [
            'token' => 'c92f222z41n1cezp',
            'to' => $user->phone, // Numéro de téléphone pour la notification WhatsApp
            'body' => 'Salut ' . $input['name'] . ' ' . $input['prenoms'] . ' Votre compte Boukishopping a été créé avec succès. Pour vous connecter à votre compte, cliquez sur https://boukishopping.com/login. suivez l\'historique de vos commandes directement depuis votre compte pour rester informé(e) sur l\'état de vos achats.  '
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

        // Envoi de la notification WhatsApp
        $whatsappResponse = file_get_contents($whatsappUrl, false, $whatsappContext);

        // Retourner l'utilisateur créé
        return $user;
    }
}
