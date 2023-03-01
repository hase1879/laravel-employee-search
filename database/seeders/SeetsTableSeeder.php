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
            'seetnumber' => 'A-1',
        ]);

        Seet::create([
            'seetnumber' => 'A-2',
        ]);

        Seet::create([
            'seetnumber' => 'A-3',
        ]);

        Seet::create([
            'seetnumber' => 'A-4',
        ]);
    }
}
