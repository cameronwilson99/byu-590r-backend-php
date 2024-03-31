<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Card',
                'description' => 'Card games are games that are played with a deck of playing cards.'
            ],
            [
                'name' => 'Board',
                'description' => 'Board games are games that are played on a board.'
            ],
            [
                'name' => 'Dice',
                'description' => 'Dice games are games that are played with dice.'
            ],
            [
                'name' => 'Puzzle',
                'description' => 'Puzzle games are games that are played to solve a puzzle.'
            ],
            [
                'name' => 'Strategy',
                'description' => 'Strategy games are games that require strategic thinking.'
            ],
            [
                'name' => 'Role-Playing',
                'description' => 'Role-playing games are games that involve playing a role.'
            ],
            [
                'name' => 'Party',
                'description' => 'Party games are games that are played with groups of people.'
            ],
            [
                'name' => 'Children',
                'description' => 'Children games are games that are played by children.'
            ],
            [
                'name' => 'Family',
                'description' => 'Family games are games that are played by families.'
            ],
            [
                'name' => 'Adult',
                'description' => 'Adult games are games that are played by adults.'
            ]
        ];

        Category::insert($categories);
    }
}
