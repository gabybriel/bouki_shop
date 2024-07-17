<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Vue;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function marchand()
    {
        // Récupérer uniquement les utilisateurs qui sont des marchands (is_vendor = true)
        $users = User::where('is_vendor', true)->get();

        // Passer les utilisateurs récupérés à la vue 'marchands.index'
        return view('marchands.index', compact('users'));
    }

    public function getVues()
    {
        // Remplacez ces valeurs par la logique réelle pour récupérer les vues
        $vuesDuJour = Vue::whereDate('created_at', Carbon::today())->count();
        $vuesDuMois = Vue::whereMonth('created_at', Carbon::now()->month)->count();

        return response()->json([
            'vuesDuJour' => $vuesDuJour,
            'vuesDuMois' => $vuesDuMois,
        ]);
    }

    public function plus()
    {
        $articles = Article::all();
        $categories = Categorie::all();
        $article = Article::paginate(10);
        $subcategories = SubCategory::all();
        return view('plus', compact('articles', 'categories', 'subcategories', 'article'));
    }

}
