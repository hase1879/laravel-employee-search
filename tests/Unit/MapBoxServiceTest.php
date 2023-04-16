<?php

namespace Tests\Unit;

use App\Services\MapBoxService;
use PHPUnit\Framework\TestCase;

class MapBoxServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {

        /**
         * 座席表ページのMapBoxServiceクラスのテスト
         */

        $this->assertTrue(true);

        // テストデータを投入
        $box = new MapBoxService(
            "hoge",
            "1",
            "100",
            "200",
            "300",
            "400",
            10,
            500
        );

        // 値を指定の文字列へ変換
        $ret = $box->toStyle();

        // 指定どおりに文字列が変換できているかチェック
        $this->assertStringContainsString(
            "width: 100px",
            $ret
        );

        $this->assertStringContainsString(
            "height: 200px",
            $ret
        );

        $this->assertStringContainsString(
            "top: 300px",
            $ret
        );

        $this->assertStringContainsString(
            "left: 400px",
            $ret
        );

    }
}
