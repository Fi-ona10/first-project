<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create authors and their articles (5 authors, 2 recipes each = 10 recipes)
        $this->call([
            UserSeeder::class,
        ]);

    public function run(): void
        {
            \App\Models\User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
            ]);

        // Optional: seed events if needed
        if (class_exists(EventSeeder::class)) {
            $this->call([
                EventSeeder::class,
            ]);
        }
    }
}
