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
        $user = User::where("email","=","demo@example.com")->first();
        $this->assertNotNull($user);

        $response = $this->actingAs($user)
            ->get('/home');

        $response->assertStatus(200);



    }

    public function test_not_login(){
        $response = $this->get('/home');
        $response->assertStatus(302);
        $response->assertRedirectContains("/login");
    }
}
