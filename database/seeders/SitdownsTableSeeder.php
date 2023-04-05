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
            'seet_id' => 1,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 2,
            'seet_id' => 2,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 3,
            'seet_id' => 3,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 4,
            'seet_id' => 4,
            'status' => 3,

        ]);

        Sitdown::create([
            'user_id' => 5,
            'seet_id' => 5,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 6,
            'seet_id' => 6,
            'status' => 2,

        ]);

        // Sitdown::create([
        //     'user_id' => 7,
        //     'seet_id' => 7,
        //     'status' => 2,

        // ]);

        // Sitdown::create([
        //     'user_id' => 8,
        //     'seet_id' => 8,
        //     'status' => 3,
        // ]);

        Sitdown::create([
            'user_id' => 7,
            'seet_id' => 9,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 8,
            'seet_id' => 10,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 9,
            'seet_id' => 11,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 10,
            'seet_id' => 12,
            'status' => 3,
        ]);

        Sitdown::create([
            'user_id' => 11,
            'seet_id' => 13,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 12,
            'seet_id' => 14,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 13,
            'seet_id' => 15,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 14,
            'seet_id' => 16,
            'status' => 3,

        ]);

        Sitdown::create([
            'user_id' => 15,
            'seet_id' => 17,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 16,
            'seet_id' => 18,
            'status' => 2,

        ]);

        Sitdown::create([
            'user_id' => 17,
            'seet_id' => 19,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 18,
            'seet_id' => 20,
            'status' => 3,
        ]);

        Sitdown::create([
            'user_id' => 19,
            'seet_id' => 21,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 20,
            'seet_id' => 22,
            'status' => 2,

        ]);

        Sitdown::create([
            'user_id' => 21,
            'seet_id' => 23,
            'status' => 1,

        ]);

        Sitdown::create([
            'user_id' => 22,
            'seet_id' => 24,
            'status' => 3,
        ]);
    }
}
