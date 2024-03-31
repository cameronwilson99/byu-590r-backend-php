<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories_games = [];

        $card = Category::where('name', 'Card')->first();
        $board = Category::where('name', 'Board')->first();
        $dice = Category::where('name', 'Dice')->first();
        $puzzle = Category::where('name', 'Puzzle')->first();
        $strategy = Category::where('name', 'Strategy')->first();
        $rolePlaying = Category::where('name', 'Role-Playing')->first();
        $party = Category::where('name', 'Party')->first();
        $children = Category::where('name', 'Children')->first();
        $family = Category::where('name', 'Family')->first();
        $adult = Category::where('name', 'Adult')->first();

        $ohcrud = Game::where('name', 'Oh Crud')->first();
        $azul = Game::where('name', 'Azul')->first();
        $chicken = Game::where('name', 'Chicken!')->first();
        $spicyfarkel = Game::where('name', 'Spicy Farkel')->first();
        $catan = Game::where('name', 'Catan')->first();
        $skyjo = Game::where('name', 'Skyjo')->first();

        array_push($categories_games, [
            'category_id' => $card->id,
            'game_id' => $ohcrud->id
        ]);

        array_push($categories_games, [
            'category_id' => $strategy->id,
            'game_id' => $ohcrud->id
        ]);

        array_push($categories_games, [
            'category_id' => $board->id,
            'game_id' => $azul->id
        ]);

        array_push($categories_games, [
            'category_id' => $strategy->id,
            'game_id' => $azul->id
        ]);

        array_push($categories_games, [
            'category_id' => $dice->id,
            'game_id' => $chicken->id
        ]);

        array_push($categories_games, [
            'category_id' => $party->id,
            'game_id' => $chicken->id
        ]);

        array_push($categories_games, [
            'category_id' => $dice->id,
            'game_id' => $spicyfarkel->id
        ]);

        array_push($categories_games, [
            'category_id' => $family->id,
            'game_id' => $spicyfarkel->id
        ]);

        array_push($categories_games, [
            'category_id' => $strategy->id,
            'game_id' => $catan->id
        ]);

        array_push($categories_games, [
            'category_id' => $board->id,
            'game_id' => $catan->id
        ]);

        array_push($categories_games, [
            'category_id' => $card->id,
            'game_id' => $skyjo->id
        ]);

        array_push($categories_games, [
            'category_id' => $party->id,
            'game_id' => $skyjo->id
        ]);

        DB::table('categories_games')->insert($categories_games);
    }
}
