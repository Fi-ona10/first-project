<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingredient;
use App\Models\Article;

/**
 * @extends Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    public function definition(): array
    {
        $ingredientNames = [
            'Tomatoes', 'Lettuce', 'Potatoes', 'Chicken Breast', 'Quinoa',
            'Mixed Nuts', 'Greek Yoghurt 0% Fat', 'Olive Oil', 'Cucumber',
            'Whole Wheat Flour', 'Zucchini', 'Carrots', 'Bell Peppers',
            'Spinach', 'Avocado', 'Eggs', 'Brown Rice', 'Salmon', 'Tofu', 'Broccoli', 
            'Garlic', 'Onion', 'Lemon Juice', 'Basil', 'Parsley', 'Coconut Milk'
        ];

        $units = ['g', 'ml', 'tbsp', 'tsp', 'piece(s)'];

        return [
            'article_id' => Article::factory(), // oder ein existierender Artikel
            'name'       => $this->faker->randomElement($ingredientNames),
            'quantity'   => $this->faker->numberBetween(5, 100) . ' ' . $this->faker->randomElement($units), 
            'is_healthy' => true, // Alle Zutaten sind gesund
        ];
    }
}
