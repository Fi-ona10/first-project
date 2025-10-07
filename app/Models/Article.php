<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Ingredient;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id', // Author
    ];

    /**
     * Relationship: An article belongs to a user (author)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Optional: alias for clarity
     * Relationship: Article's author
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship: An article has many ingredients
     */
    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class, 'article_id');
    }
        /**
     * Prüft, ob der eingeloggte User diesen Artikel bearbeiten oder löschen darf.
     */
    public function canEditOrDelete(): bool
    {
        // Gibt true zurück, wenn ein User eingeloggt ist UND dieser der Autor ist
        return auth()->check() && auth()->id() === $this->user_id;
    }

}
