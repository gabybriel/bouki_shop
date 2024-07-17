<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleVariant;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articles = Article::all(); // Récupérer tous les articles
        return view('article_variants.create', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $articleId)
    {
        $article = Article::findOrFail($articleId);

        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'size' => 'required|string',
            'color' => 'required|string',
            'quantity' => 'required|integer',
        ]);
        
        $variant = new ArticleVariant($request->all());
        $variant->article_id = $article->id;
        $variant->save();
        $article->recalculateTotalQuantity();

        return redirect()->route('articles.index', $articleId)->with('success', 'Variant ajouter !');
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
    public function update(Request $request, $id)
    {
        $variant = ArticleVariant::findOrFail($id);
        $variant->update($request->all());
        $articles = Article::all();

        $variant->article->recalculateTotalQuantity();

        return redirect()->compact('articles')->route('articles.show', $variant->article_id)->with('success', 'Variant updated successfully!');
    }

    public function destroy($id)
    {
        $variant = ArticleVariant::findOrFail($id);
        $articleId = $variant->article_id;
        $variant->delete();

        $variant->article->recalculateTotalQuantity();

        return redirect()->route('articles.show', $articleId)->with('success', 'Variant deleted successfully!');
    }
}
