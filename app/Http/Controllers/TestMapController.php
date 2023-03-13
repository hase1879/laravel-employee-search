<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sitdown;
use App\Models\Seet;
use App\Models\User;
use App\Models\Employee;

class TestMapController extends Controller
{
    //



    function showMap(){
        $box = [];
        $seats = Seet::with('sitdown')->get();
        // Employee::with('user')->get();
        // dd($seats[0]->sitdown->id);


        //$box[] = 'width: 118px; height: 121px; top: 226px; left: 391px;';
        //$box[] = 'width: 118px; height: 69px; top: 215px; left: 694px;';

        $box[] = new MapBox($seats[0]->seetnumber , $seats[0]->sitdown->width, $seats[0]->sitdown->height, $seats[0]->sitdown->top, $seats[0]->sitdown->left);
        $box[] = new MapBox($seats[1]->seetnumber , $seats[1]->sitdown->width, $seats[1]->sitdown->height, $seats[1]->sitdown->top, $seats[1]->sitdown->left);
        $box[] = new MapBox($seats[2]->seetnumber , $seats[2]->sitdown->width, $seats[2]->sitdown->height, $seats[2]->sitdown->top, $seats[2]->sitdown->left);
        $box[] = new MapBox($seats[3]->seetnumber , $seats[3]->sitdown->width, $seats[3]->sitdown->height, $seats[3]->sitdown->top, $seats[3]->sitdown->left);

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
