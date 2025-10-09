<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Admin user
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        // 2️⃣ Additional users (realistic authors)
        for ($i = 1; $i <= 5; $i++) {
            $user = User::factory()->create([
                'email' => "author{$i}@example.com", // eindeutige Email pro User
            ]);

            // jeder Autor bekommt 3 Artikel mit 5 Zutaten
            Article::factory(3)
                ->for($user)
                ->hasIngredients(5)
                ->state(['image' => null])
                ->create();
        }

        // 3️⃣ Extra articles for admin (mit Zutaten)
        Article::factory(3)
            ->for($admin)
            ->hasIngredients(5)
            ->state(['image' => null])
            ->create();

    }
}
