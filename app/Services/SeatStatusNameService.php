<?php

namespace App\Services;

use App\Enums\SeatStatusEnum;

class SeatStatusNameService {

    public function seatStatusName($statusNumber)
    {

        $seatStatusNumber = SeatStatusEnum::from($statusNumber);
        $seatStatus = NULL;
        if(isset( $seatStatusNumber  )){
            switch ($seatStatusNumber ){
                case SeatStatusEnum::着席:
                $seatStatus = "着席";
                break;
                case SeatStatusEnum::会議中:
                $seatStatus = "会議中";
                break;
                case SeatStatusEnum::一時離席:
                $seatStatus = "一時離席";
                break;
                default:
                $seatStatus = "離席";
                break;
            }
        }

        return $seatStatus;
    }
}
