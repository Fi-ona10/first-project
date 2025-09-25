<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingredient;
use App\Models\Article;

class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    public function definition(): array
    {
        $ingredientNames = [
            'Tomatoes', 'Salad', 'Potatoes', 'Chicken Breast', 'Quinoa',
            'Mixed Nuts', 'Yoghurt 0% fat', 'Olive Oil', 'Cucumber',
            'Whole Wheat Flour', 'Zucchini', 'Carrots', 'Bell Peppers'
        ];

        return [
            'article_id' => Article::factory(),
            'name'       => $this->faker->randomElement($ingredientNames),
            'quantity_g' => 200,
            'is_healthy' => true,
        ];
    }
}
