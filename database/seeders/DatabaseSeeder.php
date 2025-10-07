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
        User::factory(5)
            ->has(
                Article::factory(3) // jeder Autor bekommt 3 Artikel
                    ->hasIngredients(5) // jeder Artikel bekommt 5 Zutaten
            )
            ->create();

        // 3️⃣ Extra articles for admin (mit Zutaten)
        Article::factory(3)
            ->for($admin)
            ->hasIngredients(5)
            ->create();
    }
}
