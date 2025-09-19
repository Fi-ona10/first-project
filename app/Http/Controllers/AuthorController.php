<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthorController extends Controller
{
    public function index()
    {
        // Nur User laden, die mindestens einen Artikel geschrieben haben
        $authors = User::has('articles')->with('articles')->get();

        return view('authors.index', compact('authors'));
    }

    public function show($id)
    {
        // Autor inkl. Artikel laden
        $author = User::with('articles')->findOrFail($id);

        return view('authors.show', compact('author'));
    }
}
