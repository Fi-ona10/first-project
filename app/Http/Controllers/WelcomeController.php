<?php

namespace App\Http\Controllers;

use App\Models\Article;

class WelcomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->take(5)->get(); // load 5 latest
        return view('welcome', compact('articles'));
    }
}

use Illuminate\Support\Facades\Auth;

public function index()
{
    if (Auth::check()) {
        $articles = \App\Models\Article::where('user_id', Auth::id())->get();
    } else {
        $articles = \App\Models\Article::latest()->take(5)->get();
    }

    return view('welcome', compact('articles'));
}
