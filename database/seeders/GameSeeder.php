<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'name' => 'Oh Crud',
                'description' => "Roll the dice and don't get stuck with the crud!",
                'publisher_id' => 1,
                'image' => 'games/ohcrud.jpg',
                'price' => 7.99,
                'stock' => 9,
            ],
            [
                'name' => 'Azul',
                'description' => 'Abstract tile-laying game.',
                'publisher_id' => 2,
                'image' => 'games/azul.jpg',
                'price' => 24.99,
                'stock' => 16,
            ],
            [
                'name' => 'Chicken!',
                'description' => 'Fast paced dice Game, get the most chickens, avoid the foxes!',
                'publisher_id' => 3,
                'image' => 'games/chicken.jpg',
                'price' => 9.99,
                'stock' => 22,
            ],
            [
                'name' => 'Spicy Farkel',
                'description' => 'A spicy twist on the classic dice game.',
                'publisher_id' => 4,
                'image' => 'games/spicyfarkel.jpg',
                'price' => 9.99,
                'stock' => 13,
            ],
            [
                'name' => 'Catan',
                'description' => 'Classic city-building board game.',
                'publisher_id' => 5,
                'image' => 'games/catan.jpg',
                'price' => 39.99,
                'stock' => 7,
            ],
            [
                'name' => 'Skyjo',
                'description' => 'Get the lowest score to win! A fun card game for all ages.',
                'publisher_id' => 6,
                'image' => 'games/skyjo.jpg',
                'price' => 12.99,
                'stock' => 11,
            ]
        ];
        Game::insert($games);
    }
}
