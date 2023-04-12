<?php

namespace App\Enums;

// php8.1以上対応
enum SeatStatusEnum: int
{
    case 着席 = 1;
    case 会議中 = 2;
    case 一時離席 = 3;
    case 離席 = -1;

        // 日本語を追加
        public function label(): string
        {
            return match($this)
            {
                SeatStatusEnum::着席 => '着席',
                SeatStatusEnum::会議中 => '会議中',
                SeatStatusEnum::一時離席 => '一時離席',
                SeatStatusEnum::離席 => '離席',
            };
        }
}
