<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sitdown;
use App\Models\User;

class SitdownsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sitdown::create([
            'user_id' => 1,
            'seet_id' => 2,
            'status' => 1,
        ]);

        Sitdown::create([
            'user_id' => 2,
            'seet_id' => 1,
            'status' => 2,
        ]);

        Sitdown::create([
            'user_id' => 3,
            'seet_id' => 3,
            'status' => 2,
        ]);

        Sitdown::create([
            'user_id' => 4,
            'seet_id' => 4,
            'status' => 3,
        ]);
    }
}
