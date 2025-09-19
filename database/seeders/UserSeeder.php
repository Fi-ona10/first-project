<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Fiona Example',
            'email' => 'fiona@example.com',
            'password' => bcrypt('secret'), // wichtig: Passwort hashen
        ]);

        User::create([
            'name' => 'Max Mustermann',
            'email' => 'max@example.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
