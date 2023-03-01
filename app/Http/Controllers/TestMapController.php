<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestMapController extends Controller
{
    //

    function showMap(){
        $box = [];


        //$box[] = 'width: 118px; height: 121px; top: 226px; left: 391px;';
        //$box[] = 'width: 118px; height: 69px; top: 215px; left: 694px;';

        $box[] = new MapBox("aaa", 118, 121, 226, 391);
        $box[] = new MapBox("bbb", 118, 69, 215, 694);

        return view("test-map",[
            "box_list" => $box
        ]);
    }
}

class MapBox {

    function __construct(
        public $label,
        public $width,
        public $height,
        public $top,
        public $left,
    ){

    }

    function toStyle(){
        return "width: {$this->width}px; height: {$this->height}px; top: {$this->top}px; left: {$this->left}px; ";
    }

}
