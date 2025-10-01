<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $articles = Article::where('user_id', Auth::id())->get();
        } else {
            $articles = Article::latest()->take(5)->get();
        }

        return view('welcome', compact('articles'));
    }
}
