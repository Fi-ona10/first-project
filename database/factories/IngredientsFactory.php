<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredients>
 */
class IngredientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Ingredients' => [
                'Tomatoes 500g',
                'Salade 1pc',
                'Potatoes 500g',
                'Chicken Breast 200g',
                'Quinoa 250g',
                'Mixed Nuts 10g"',
                'Yoghurt 0%fat 150g',"',
                'Olive oil 1 tbsp',
                'Cucumber 1pc ',
                'whole weat flour 500g',
                'Zucchini 2pc',
                'Carrots 3pc',
            ],
        ];

        // Pick category first so title can match it
        $category = fake()->randomElement(array_keys($titles));

        return [
            'recipe_id'   => fake()->numberBetween(1, 10),
            'number of portions'=> fake()->numberBetween(1, 6)
            'Name'=> fake()->text(50),
            'category'   => $category,
        ];
    }
}
