<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Ingredient;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create authors and their articles (5 authors, 2 recipes each = 10 recipes)
        $this->call([
            UserSeeder::class,
        ]);

        // Optional: EventSeeder
        $this->call([
            EventSeeder::class,
        ]);
    }
}
