<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SeatService;
use App\Models\Seet;
use App\Models\Sitdown;

class SeatTestController extends Controller
{
    //

    function doTestService(SeatService $service){

        $seat = Seet::find(1);
        $user = Auth::user();
        $service->着席($user, $seat);

        //$service->離席($user);

        $seats = Seet::all();
        $sitdowns = Sitdown::with("user")->get()->groupBy("seet_id");
        //dd( $sitdowns);

        return view("seat-list",[
            "seats" => $seats,
            "sitdowns" => $sitdowns
        ]);

    }

    function doPost(Request $request, SeatService $service){

        $seat_id = $request->input("seat_id");

        $seat = Seet::find($seat_id);
        $user = Auth::user();
        $service->着席($user, $seat);

    }
}
