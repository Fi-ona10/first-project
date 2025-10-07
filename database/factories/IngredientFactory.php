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
            'Spinach', 'Avocado', 'Eggs', 'Brown Rice', 'Salmon', 'Tofu', 'Broccoli'
        ];

        return [
            // wird beim Seeden automatisch überschrieben, wenn Artikel schon existieren
            'article_id' => Article::factory(),
            'name'       => $this->faker->randomElement($ingredientNames),
            'quantity_g' => $this->faker->numberBetween(50, 300),
            'is_healthy' => $this->faker->boolean(90), // 90% healthy
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
