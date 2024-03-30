<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            ['game_id' => 1, 'rating' => 5, 'comment' => 'Great game!'],
            ['game_id' => 1, 'rating' => 4, 'comment' => 'Good game!'],
            ['game_id' => 1, 'rating' => 3, 'comment' => 'Okay game!'],
            ['game_id' => 2, 'rating' => 5, 'comment' => 'Great game!'],
            ['game_id' => 2, 'rating' => 4, 'comment' => 'Good game!'],
            ['game_id' => 2, 'rating' => 3, 'comment' => 'Okay game!'],
            ['game_id' => 3, 'rating' => 5, 'comment' => 'Great game!'],
            ['game_id' => 3, 'rating' => 4, 'comment' => 'Good game!'],
            ['game_id' => 3, 'rating' => 3, 'comment' => 'Okay game!'],
            ['game_id' => 4, 'rating' => 5, 'comment' => 'Great game!'],
            ['game_id' => 4, 'rating' => 4, 'comment' => 'Good game!'],
            ['game_id' => 4, 'rating' => 3, 'comment' => 'Okay game!'],
            ['game_id' => 5, 'rating' => 5, 'comment' => 'Great game!'],
            ['game_id' => 5, 'rating' => 4, 'comment' => 'Good game!'],
            ['game_id' => 5, 'rating' => 3, 'comment' => 'Okay game!'],
        ];

        Review::insert($reviews);
    }
}
