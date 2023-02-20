<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => '丸山 未希子',
            'email' => 'test1231@example.com',
            'password' => 'test1231',
        ]);

        User::create([
            'name' => '樋浦 圭',
            'email' => 'test1232@example.com',
            'password' => 'test1232',
        ]);

        User::create([
            'name' => '田口 舞子',
            'email' => 'test1233@example.com',
            'password' => 'test1233',
        ]);

        User::create([
            'name' => '八尾 努',
            'email' => 'test1234@example.com',
            'password' => 'test1234',
        ]);

        User::create([
            'name' => '田辺 舞',
            'email' => 'test1235@example.com',
            'password' => 'test1235',
        ]);

        User::create([
            'name' => '八 剛',
            'email' => 'test1236@example.com',
            'password' => 'test1236',
        ]);


    }
}
