<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::all();
        return view('authors.index', compact('authors'));
    }

    public function show($id)
    {
        // Autor inkl. Artikel laden
        $author = User::with('articles')->findOrFail($id);

        return view('authors.show', compact('author'));
    }
}
