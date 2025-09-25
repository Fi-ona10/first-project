<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    protected $model = \App\Models\Ingredient::class;

    public function definition(): array
    {
        // List of realistic ingredient names
        $ingredientNames = [
            'Tomatoes', 'Salad', 'Potatoes', 'Chicken Breast', 'Quinoa',
            'Mixed Nuts', 'Yoghurt 0% fat', 'Olive Oil', 'Cucumber',
            'Whole Wheat Flour', 'Zucchini', 'Carrots', 'Bell Peppers'
        ];

        return [
            'article_id'   => Article::factory(), // links to a recipe
            'name'         => $this->faker->randomElement($ingredientNames),
            'mengenangabe' => $this->faker->numberBetween(50, 500) . ' g', // random fixed quantity
        ];
    }
}
