<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Ingredient;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create users first
        $this->call([
            UserSeeder::class,
        ]);

        // Create 10 articles; each article gets 7 fixed healthy ingredients of 200g
        Article::factory(10)->create()->each(function ($article) {
            $names = ['Spinach','Tomatoes','Cucumber','Chicken Breast','Quinoa','Greek Yogurt','Olive Oil'];
            foreach ($names as $name) {
                $article->ingredients()->create([
                    'name' => $name,
                    'quantity_g' => 200,
                    'is_healthy' => true,
                ]);
            }
        });

        // Optional: EventSeeder
        $this->call([
            EventSeeder::class,
        ]);
    }
}
