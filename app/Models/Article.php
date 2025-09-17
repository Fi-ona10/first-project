<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    // Each article (recipe) has many ingredients
    public function ingredients()
    {
        return $this->hasMany(Ingredients::class, 'recipe_id');
    }
}