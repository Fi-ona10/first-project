<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        // Fetch up to 10 articles that have healthy ingredients, eager-load only healthy ingredients
        $articles = Article::query()
            ->whereHas('ingredients', function ($q) {
                $q->where('is_healthy', true);
            })
            ->with(['ingredients' => function ($q) {
                $q->where('is_healthy', true);
            }])
            ->latest()
            ->take(10)
            ->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        // Fetch the article with healthy ingredients
        $article = Article::with(['ingredients' => function ($q) {
            $q->where('is_healthy', true);
        }])->findOrFail($id);
    
        // Wenn der User eingeloggt ist und der Autor ist, auf Management weiterleiten
        if (auth()->check() && auth()->id() === $article->user_id) {
            return redirect()->route('management.articles.show', $article->id);
        }
    
        // Alle anderen sehen die normale Show-View
        return view('articles.show', compact('article'));
    }
}

