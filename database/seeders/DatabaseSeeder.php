<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Ingredient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First, make sure users exist
        $this->call([
            UserSeeder::class,
        ]);

        // Create 10 articles (recipes), each with 7 ingredients
        Article::factory(10)
            ->has(Ingredient::factory()->count(7), 'ingredients')
            ->create();

        // If you still want events, call the EventSeeder
        $this->call([
            EventSeeder::class,
        ]);
    }
}
