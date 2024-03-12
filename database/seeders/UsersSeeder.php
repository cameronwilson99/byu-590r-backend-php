<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Cameron Wilson',
                'email' => 'cw@test.com',
                'avatar' => null,
                'email_verified_at' => null,
                'password' => bcrypt('purplesweaterpals'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]
        ];
        User::insert($users);
    }
}