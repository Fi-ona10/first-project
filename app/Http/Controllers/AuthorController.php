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
}
