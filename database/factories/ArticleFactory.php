<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title'   => $this->faker->sentence(4),
            'content' => $this->faker->paragraph(5),

            // Automatically assign to a random user (author)
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
