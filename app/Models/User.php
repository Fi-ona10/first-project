<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Die Attribute, die massenweise zuweisbar sind.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Die Attribute, die beim Serialisieren verborgen bleiben.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Die Attribute, die gecastet werden sollen.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Initialen des Users
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * Beziehung: Ein User hat viele Artikel
     */
    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class, 'user_id');
    }
}
