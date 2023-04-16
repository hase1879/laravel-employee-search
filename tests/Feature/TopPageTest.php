<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TopPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        // （'/'）のページの表示テスト
        $response->assertStatus(200);

        $content = $response->content();

        $this->assertTrue(
            strpos($content, "社員一覧ページで、該当部署の絞り込み") > -1
        );
    }
}
