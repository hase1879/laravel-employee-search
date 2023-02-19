<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seet;
use App\Models\User;


class SeetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seet::create([
            'user_id' => 1,
            'seetnumber' => 'A-1',
        ]);

        Seet::create([
            'user_id' => 2,
            'seetnumber' => 'A-2',
        ]);

        Seet::create([
            'user_id' => 3,
            'seetnumber' => 'A-3',
        ]);

        Seet::create([
            'user_id' => 4,
            'seetnumber' => 'A-4',
        ]);
    }
}
