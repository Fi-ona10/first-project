<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // User 1 erstellen
        $user1 = User::create([
            'name' => 'Fiona Example',
            'email' => 'fiona@example.com',
            'password' => bcrypt('secret'),
        ]);

        // Artikel für User 1
        Article::create([
            'title' => 'Fionas Erstes Rezept',
            'content' => 'Leckeres Rezept von Fiona...',
            'user_id' => $user1->id,
        ]);

        // User 2 erstellen
        $user2 = User::create([
            'name' => 'Max Mustermann',
            'email' => 'max@example.com',
            'password' => bcrypt('secret'),
        ]);

        // Artikel für User 2
        Article::create([
            'title' => 'Max Mustermanns Rezept',
            'content' => 'Super leckeres Rezept von Max...',
            'user_id' => $user2->id,
        ]);
    }
}
