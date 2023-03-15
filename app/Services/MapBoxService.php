<?php

namespace App\Services;


// 座席マップ_CSS表記に変換
class MapBoxService {

function __construct(
    public $label,
    public $seat_user,
    public $width,
    public $height,
    public $top,
    public $left,
    public $status,
    public $seet_id,
){

}

function toStyle(){
    return "width: {$this->width}px; height: {$this->height}px; top: {$this->top}px; left: {$this->left}px; ";
}

}
