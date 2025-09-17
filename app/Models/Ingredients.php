<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientsFactory> */
    use HasFactory;

    // Each ingredient belongs to an article (recipe)
    public function article()
    {
        return $this->belongsTo(Article::class, 'recipe_id');
    }
}
