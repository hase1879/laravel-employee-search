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
                'width' => 85,
                'height' => 83,
                'top' => 53,
                'left' => 176,
            ]);

            Seet::create([
                'seetnumber' => 'A-2',
                'width' => 85,
                'height' => 83,
                'top' => 53,
                'left' => 268,
            ]);

            Seet::create([
                'seetnumber' => 'A-3',
                'width' => 85,
                'height' => 83,
                'top' => 53,
                'left' => 427,
            ]);

            Seet::create([
                'seetnumber' => 'A-4',
                'width' => 85,
                'height' => 83,
                'top' => 53,
                'left' => 519,

            ]);

            Seet::create([
                'seetnumber' => 'A-5',
                'width' => 85,
                'height' => 83,
                'top' => 53,
                'left' => 675,
            ]);

            Seet::create([
                'seetnumber' => 'A-6',
                'width' => 85,
                'height' => 83,
                'top' => 53,
                'left' => 767,
            ]);

            Seet::create([
                'seetnumber' => 'A-7',
                'width' => 85,
                'height' => 83,
                'top' => 143,
                'left' => 176,
            ]);

            Seet::create([
                'seetnumber' => 'A-8',
                'width' => 85,
                'height' => 83,
                'top' => 143,
                'left' => 268,
            ]);

            Seet::create([
                'seetnumber' => 'A-9',
                'width' => 85,
                'height' => 83,
                'top' =>143,
                'left' => 427,
            ]);

            Seet::create([
                'seetnumber' => 'A-10',
                'width' => 85,
                'height' => 83,
                'top' =>143,
                'left' => 519,
            ]);

            Seet::create([
                'seetnumber' => 'A-11',
                'width' => 85,
                'height' => 83,
                'top' => 143,
                'left' => 675,
            ]);

            Seet::create([
                'seetnumber' => 'A-12',
                'width' => 85,
                'height' => 83,
                'top' => 143,
                'left' => 767,

            ]);
    }

}
