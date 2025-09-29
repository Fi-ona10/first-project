<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'name',
        'quantity_g',
        'is_healthy',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
