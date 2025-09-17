<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call(ArticleSeeder::class);
}

    {
        $users = \App\Models\User::factory(10)->create();

        // Create 10 articles, each assigned to a random user from above
        \App\Models\Article::factory(20)->make()->each(function ($article) use ($users) {
            $article->author_id = $users->random()->id;
            $article->save();
        });
public function run(): void
{
    $this->call(EventSeeder::class);
}

    }
}