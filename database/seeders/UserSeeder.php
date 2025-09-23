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

        $user1->articles()->createMany([
            [
                'title' => 'Fionas Erstes Rezept',
                'content' => 'Leckeres Rezept...',
            ],
            [
                'title' => 'Fionas Zweites Rezept',
                'content' => 'Noch ein tolles Rezept...',
            ],
        ]);

        // Autor 2
        $user2 = User::create([
            'name' => 'Max Mustermann',
            'email' => 'max@example.com',
            'password' => bcrypt('secret'),
        ]);

        $user2->articles()->createMany([
            [
                'title' => 'Maxs Erstes Rezept',
                'content' => 'Herzhaftes Rezept von Max...',
            ],
            [
                'title' => 'Maxs Zweites Rezept',
                'content' => 'Noch leckereres Rezept von Max...',
            ],
        ]);
    }
}
