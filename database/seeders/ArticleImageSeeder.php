<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleImageSeeder extends Seeder
{
    public function run(): void
    {
        Article::all()->each(function($article) {
            $article->image = 'https://source.unsplash.com/800x600/?healthy-food&sig=' . rand(1,1000);
            $article->save();
        });
    }
}
