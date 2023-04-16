<?php

namespace App\Services;



class MapBoxService
{

    // 座席表データリストの命名
    function __construct(
        public $label,
        public $seat_user,
        public $width,
        public $height,
        public $top,
        public $left,
        public $status,
        public $seet_id,
    ) {
    }

    // 座席アイコン_CSSに読み込めるようにデータ成形
    function toStyle()
    {
        $styles = [
            "width" => $this->width . "px",
            "height" => $this->height . "px",
            "top" => $this->top . "px",
            "left" => $this->left . "px",
        ];

        $ret = [];
        foreach($styles as $key => $value){
            $ret[] = $key . ": " . $value;
        }
        // 区切り文字を結合
        return implode(";", $ret);
    }
}
