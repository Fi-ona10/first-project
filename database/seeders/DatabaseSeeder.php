<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Always call your seeders here, in the order you need
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            EventSeeder::class, // if you still want events
        ]);
    }
}
