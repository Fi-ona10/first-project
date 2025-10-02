<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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
        // Fetch the one article that is requested, with its healthy ingredients
        $article = Article::with(['ingredients' => function ($q) {
            $q->where('is_healthy', true);
        }])->findOrFail($id);

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
        ]);
        
        $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => auth()->id(), // automatisch eingeloggter User
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
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        // 1. Validate the input
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        // 2. Load the correct article
        $article = Article::findOrFail($id);

        // 3. Update with validated data
        $article->update($validated);

        // 4. Redirect back to the article page
        return redirect()->route('articles.show', $article->id);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index');
    }
}
