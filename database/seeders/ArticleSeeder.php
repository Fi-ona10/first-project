<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            'Fresh Avocado Salad',
            'Mediterranean Quinoa Bowl',
            'Grilled Salmon with Veggies',
            'Vegan Lentil Soup',
            'Protein Smoothie',
            'Overnight Oats with Berries',
            'Chickpea Curry',
            'Zucchini Noodles with Pesto',
            'Oven-Roasted Vegetables',
            'Greek Yogurt Parfait',
            'Homemade Hummus with Veggie Sticks',
            'Whole Grain Wraps with Chicken',
            'Sweet Potato Fries',
            'Stuffed Bell Peppers',
            'Green Detox Smoothie',
            'Spinach & Feta Omelette',
            'Asian Stir Fry with Tofu',
            'Baked Oatmeal',
            'Tomato & Basil Soup',
            'Crispy Falafel with Tahini Sauce',
        ];

        $authors = User::all();

        foreach ($recipes as $index => $title) {
            $author = $authors[$index % $authors->count()]; // distribute articles across authors

            Article::create([
                'title' => $title,
                'content' => 'This is a healthy recipe description for ' . $title,
                'user_id' => $author->id,      // optional, falls die Spalte noch existiert
                'author_id' => $author->id,    // muss gesetzt werden, da NOT NULL
            ]);
        }
    }
}
