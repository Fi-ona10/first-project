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
        ];

        // Kurzbeschreibung für Rezepte
        $descriptions = [
            'A fresh and nutritious salad perfect for lunch.',
            'A protein-packed bowl for energy all day.',
            'A colorful and healthy vegan option.',
            'Simple grilled salmon with seasonal vegetables.',
            'A delicious smoothie with berries and protein.',
            'Low-carb zucchini noodles with tasty pesto.',
            'Hearty oatmeal breakfast to start your day.'
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
            'image' => 'https://source.unsplash.com/800x600/?healthy-food&sig=' . rand(1, 1000),

        ];
    }
}
