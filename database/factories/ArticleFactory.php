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

        $recipeTitles = [
            'Healthy Avocado Salad',
            'Quinoa Power Bowl',
            'Vegan Buddha Bowl',
            'Grilled Salmon with Veggies',
            'Protein Smoothie Delight',
            'Zucchini Noodles with Pesto',
            'Berry Oatmeal Breakfast'
            'Spicy Chickpea Wraps with Yogurt Sauce',
            'Sweet Potato Curry with Coconut Milk',
            'Greek Chicken Bowl with Tzatziki'
        ];

        // Kurzbeschreibung für Rezepte
        $descriptions = [
            'A fresh and nutritious salad perfect for lunch.',
            'A protein-packed bowl for energy all day.',
            'Simple grilled salmon with seasonal vegetables.',
            'A delicious smoothie with berries and protein.',
            'Low-carb zucchini noodles with tasty pesto.',
            'Hearty oatmeal breakfast to start your day.',
            'Balanced in carbs, protein, and healthy fats.',
            'Ideal after a workout or as a colorful dinner option.',
            'Naturally gluten-free and full of fresh ingredients.'
        ];

        // Bullet points für Eigenschaften/Geschmack
        $bodyBullets = [
            '• Fresh and light',
            '• Easy to prepare',
            '• High in protein',
            '• Delicious and healthy',
            '• Perfect for meal prep',
        ];


        return [
            'title' => $this->faker->randomElement($recipeTitles),
            'description' => $this->faker->randomElement($descriptions),
            'content' => implode("\n", $this->faker->randomElements($bodyBullets, 3)),
            'user_id' => User::factory(),
            'image'   => null,

        ];
    }
}
