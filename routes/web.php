<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PagesController; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Startseite
Route::get('/', [WelcomeController::class, 'index'])->name('home'); // nur eine Definition

// Articles routes (CRUD)
// Nur index und show sind für alle zugänglich
Route::resource('articles', ArticleController::class)->only(['index', 'show']);

// create, store, edit, update, destroy nur für eingeloggte User
Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class)->only([
        'create', 'store', 'edit', 'update', 'destroy'
    ]);
});

// Authors routes
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');

// Dashboard route
Route::get('/dashboard', [PagesController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile routes (auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Breeze Auth-Routen
require __DIR__.'/auth.php';


