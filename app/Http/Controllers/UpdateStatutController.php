<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class UpdateStatutController extends Controller
{
    public function updateStatus(Request $request)
    {
        // Utilisez $request->input('selected_articles') pour accéder directement aux articles sélectionnés
        $selectedArticles = $request->input('selected_articles');

        if ($selectedArticles) {
            // Convertissez la chaîne JSON en tableau d'ID
            $selectedArticlesArray = json_decode($selectedArticles);

            // Utilisez la méthode update avec whereIn pour mettre à jour le statut
            Article::whereIn('id', $selectedArticlesArray)
                ->update(['statut' => 'En ligne']);
        }

        return redirect()->route('articles.index')->with('success', 'Statut mis à jour avec succès !');
    }
}
