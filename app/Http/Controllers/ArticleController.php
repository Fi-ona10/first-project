<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // Fetch up to 10 articles that have healthy ingredients, eager-load only healthy ingredients
        $articles = \App\Models\Article::query()
            ->whereHas('ingredients', function ($q) {
                $q->where('is_healthy', true);
            })
            ->with(['ingredients' => function ($q) {
                $q->where('is_healthy', true);
            }])
            ->latest()
            ->take(10)
            ->get();

        //dd($articles); // to quickly analyse what you loaded

        // send articles to the view
        // return response
        return view('articles.index', compact('articles'));

    }

    public function show($id)
    {
        // fetch the one article that is requested, with its healthy ingredients
        $article = \App\Models\Article::with(['ingredients' => function ($q) {
            $q->where('is_healthy', true);
        }])->findOrFail($id);

        // send article to its view
        // return response
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'user_id' => ['nullable', 'exists:users,id'],
        ]);

        $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => $validated['user_id'] ?? auth()->id() ?? 1,
        ]);

        // Ensure exactly 7 healthy ingredients of 200g exist for every new article
        $defaultIngredients = [
            'Spinach', 'Tomatoes', 'Cucumber', 'Chicken Breast', 'Quinoa', 'Greek Yogurt', 'Olive Oil'
        ];

        foreach ($defaultIngredients as $name) {
            $article->ingredients()->create([
                'name' => $name,
                'quantity_g' => 200,
                'is_healthy' => true,
            ]);
        }

        return redirect()->route('articles.show', $article->id);
    }

    public function edit($id)
    {
        $article = \App\Models\Article::find($id);

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        // Step 1: load the correct article from MODEL
        $article = \App\Models\Article::findOrFail($id);

        // Step 2: Update the changes
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirect to show
        return redirect()->route('articles.show', $article->id);
    }

    public function destroy($id)
    {
        // fetch the one article that is requested
        $article = \App\Models\Article::find($id);

        $article->delete();

        return redirect()->route('articles.index');
    }

    //
}

