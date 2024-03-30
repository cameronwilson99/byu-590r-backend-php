<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = [
            ['name' => 'Ghetti Games'],
            ['name' => 'Plan B Games'],
            ['name' => 'Keymaster Games'],
            ['name' => 'Legendary Games'],
            ['name' => 'Catan Studio'],
            ['name' => 'Magilano'],
        ];

        Publisher::insert($publishers);
    }
}
