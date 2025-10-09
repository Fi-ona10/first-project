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
            Article::factory(fake()->numberBetween(3, 5))
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

                    // Plus a static "welcome" article
        Article::factory()->for($admin)->create([
            'title' => 'Welcome to the Healthy Recipes Blog',
            'description' => 'Discover fresh, balanced and delicious meals made with love.',
            'content' => "Here you’ll find a collection of nutritious recipes created by different authors. Each recipe is designed to inspire healthy eating without compromising on taste.\n\nBrowse through the sections, read the tips, and enjoy exploring your next favorite meal!",
            'image' => null,
        ]);

    }
}
