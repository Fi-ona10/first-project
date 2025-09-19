<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id', // Autor
    ];

    /**
     * Beziehung: Ein Artikel gehört zu einem User (Autor)
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * Beziehung: Ein Artikel hat viele Zutaten
     */
    public function ingredients()
    {
        return $this->hasMany(\App\Models\Ingredients::class, 'recipe_id');
    }
}
