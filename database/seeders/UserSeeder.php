<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Autor 1
        $user1 = User::create([
            'name' => 'Fiona Example',
            'email' => 'fiona@example.com',
            'password' => bcrypt('secret'),
        ]);

        Article::create([
            'title' => 'Fionas Erstes Rezept',
            'content' => 'Leckeres Rezept...',
            'user_id' => $user1->id,
        ]);

        // Autor 2
        $user2 = User::create([
            'name' => 'Max Mustermann',
            'email' => 'max@example.com',
            'password' => bcrypt('secret'),
        ]);

        Article::create([
            'title' => 'Maxs Zweites Rezept',
            'content' => 'Noch leckereres Rezept...',
            'user_id' => $user2->id,
        ]);
    }
}
