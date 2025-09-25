<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // List of authors with their articles
        $authors = [
            [
                'name' => 'Fiona Example',
                'email' => 'fiona@example.com',
                'articles' => [
                    ['title' => 'Fiona’s First Recipe', 'content' => 'Delicious recipe...'],
                    ['title' => 'Fiona’s Second Recipe', 'content' => 'Another great recipe...'],
                ],
            ],
            [
                'name' => 'Max Mustermann',
                'email' => 'max@example.com',
                'articles' => [
                    ['title' => 'Max’s First Recipe', 'content' => 'Hearty recipe from Max...'],
                    ['title' => 'Max’s Second Recipe', 'content' => 'Even tastier recipe from Max...'],
                ],
            ],
            [
                'name' => 'Anna Healthy',
                'email' => 'anna@example.com',
                'articles' => [
                    ['title' => 'Anna’s Power Salad', 'content' => 'Rich in vitamins and healthy...'],
                    ['title' => 'Anna’s Smoothie Bowl', 'content' => 'Fruity and refreshing...'],
                ],
            ],
            [
                'name' => 'Tom Fit',
                'email' => 'tom@example.com',
                'articles' => [
                    ['title' => 'Tom’s Protein Wraps', 'content' => 'Perfect after training...'],
                    ['title' => 'Tom’s Veggie Stir Fry', 'content' => 'Light and filling...'],
                ],
            ],
            [
                'name' => 'Laura Vital',
                'email' => 'laura@example.com',
                'articles' => [
                    ['title' => 'Laura’s Lentil Soup', 'content' => 'Hearty and vegan...'],
                    ['title' => 'Laura’s Overnight Oats', 'content' => 'Quick and nutritious...'],
                ],
            ],
        ];

        foreach ($authors as $authorData) {
            $user = User::create([
                'name' => $authorData['name'],
                'email' => $authorData['email'],
                'password' => bcrypt('secret'),
            ]);

            $user->articles()->createMany($authorData['articles']);
        }
    }
}
