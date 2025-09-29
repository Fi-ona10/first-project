<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController; // <- diese Zeile neu
use App\Http\Controllers\PagesController; 
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

// Articles routes with names
// Full CRUD routes for Articles
Route::resource('articles', ArticleController::class);


// Home route
Route::get('/', [PagesController::class, 'home'])->name('home');

// Authors routes
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');

// Dashboard route with middleware
Route::get('dashboard', [PagesController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Grouped routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
