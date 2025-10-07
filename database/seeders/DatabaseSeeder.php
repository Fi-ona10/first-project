<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Article;
use App\Models\Ingredient;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        // Additional users
        $users = User::factory(5)->create();

        // Articles for each user
        $users->each(function ($user) {
            Article::factory(2)->create([
                'user_id' => $user->id,
            ])->each(function ($article) {
                Ingredient::factory(5)->create([
                    'article_id' => $article->id,
                ]);
            });
        });

        // Some extra articles for the admin
        Article::factory(3)->create([
            'user_id' => $admin->id,
        ]);
    }
}
