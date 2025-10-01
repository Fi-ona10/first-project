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

