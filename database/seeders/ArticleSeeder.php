<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    use App\Models\Article;

public function run()
{
    Article::insert([
        ['title' => 'Grilled Lemon Herb Chicken with Quinoa', 'content' => 'A protein-packed dinner with fresh lemon zest.', 'author_id' => 1],
        ['title' => 'Vegan Chickpea and Spinach Curry', 'content' => 'Hearty and flavorful, plant-based curry.', 'author_id' => 1],
        ['title' => 'Baked Salmon with Garlic Green Beans', 'content' => 'Omega-3-rich salmon baked to perfection.', 'author_id' => 1],
        ['title' => 'Turkey Lettuce Wraps with Avocado', 'content' => 'Low-carb, high-protein wraps.', 'author_id' => 1],
        ['title' => 'Mediterranean Lentil Salad Bowl', 'content' => 'Packed with fiber and healthy fats.', 'author_id' => 1],
        ['title' => 'Zucchini Noodles with Pesto Chicken', 'content' => 'A low-carb twist on pasta.', 'author_id' => 1],
        ['title' => 'Quinoa Stuffed Bell Peppers', 'content' => 'Colorful peppers filled with goodness.', 'author_id' => 1],
        ['title' => 'Sweet Potato and Black Bean Tacos', 'content' => 'Sweet and savory, perfect weeknight meal.', 'author_id' => 1],
        ['title' => 'Teriyaki Tofu Stir-Fry', 'content' => 'Quick, easy, and flavorful.', 'author_id' => 1],
        ['title' => 'Spaghetti Squash with Tomato Basil Sauce', 'content' => 'A pasta alternative with fewer carbs.', 'author_id' => 1],
    ]);
}

    {
        //
    }
}
