<?php

namespace Tests\Unit;

use App\Services\SeatStatusNameService;
use PHPUnit\Framework\TestCase;

class SeatStatusNameServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test着席情報のラベル変換()
    {
        $seatStatusNameService = new SeatStatusNameService();
        $ret = $seatStatusNameService->seatStatusName(1);
        $this->assertTrue($ret == "着席");

        $ret = $seatStatusNameService->seatStatusName(2);
        $this->assertFalse($ret == "着席");

        /*
        $ret = $seatStatusNameService->seatStatusName(2);
        $this->assertTrue($ret == "着席");

        $ret = $seatStatusNameService->seatStatusName(3);
        $this->assertTrue($ret == "着席");

        $ret = $seatStatusNameService->seatStatusName(-1);
        $this->assertTrue($ret == "着席");
        */

        //$ret = $seatStatusNameService->seatStatusName(100);
        //$this->assertTrue($ret == "離席");
    }
}
