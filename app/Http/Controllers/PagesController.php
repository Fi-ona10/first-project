<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PagesController extends Controller
{
    public function index()
    {
        // Fetch latest 5 articles for the home page
        $articles = Article::latest()->take(5)->get();

        return view('welcome', compact('articles'));
    }

    public function dashboard()
    {
        // Fetch latest 5 articles for the dashboard too
        $articles = Article::latest()->take(5)->get();

        return view('dashboard', compact('articles'));
    }
}

