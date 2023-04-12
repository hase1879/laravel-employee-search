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
        $this->assertTrue(true);

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

        $ret = $box->toStyle();

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
