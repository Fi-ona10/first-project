<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        // Load all users
        $authors = User::all();
        return view('authors.index', compact('authors'));
    }

    public function show($id)
    {
        // Load author with at most 2 linked articles
        $author = User::with(['articles' => function ($q) {
            $q->latest()->take(2);
        }])->findOrFail($id);
        return view('authors.show', compact('author'));
    }
}
