<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        // Alle Benutzer laden
        $authors = User::all();
        return view('authors.index', compact('authors'));
    }

    public function show($id)
    {
        $author = User::with('articles')->findOrFail($id);
        return view('authors.show', compact('author'));
    }
}
