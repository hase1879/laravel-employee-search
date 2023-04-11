<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateDemoUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // デモユーザーデータ
        $userId = "demo@example.com";
        $password = "demo";

        $user = \App\Models\User::where("email","=",$userId)->first();

        // Factoryでデモユーザーデータ登録
        if(!$user){
            $user = \App\Models\User::factory()->create([
                'name' => 'Demo User',
                'email' => $userId,
                "password" => Hash::make($password) //hashファサードでPW作成
            ]);
        }

        dump($user->id);

    }
}
