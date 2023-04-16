<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        /**
         * ログイン時のテスト
         */

        $user = User::where("email","=","demo@example.com")->first();
        $this->assertNotNull($user);

        // $userでログインした状態　⇒　/homeへログイン
        $response = $this->actingAs($user)
            ->get('/home');

        // 404errorなどなければPASSする。
        $response->assertStatus(200);

    }

    public function test_not_login(){

        /**
         * 非ログイン時のテスト
         */

        $response = $this->get('/home');
        $response->assertStatus(302);
        $response->assertRedirectContains("/login");
    }
}
