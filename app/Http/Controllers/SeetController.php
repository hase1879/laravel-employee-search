<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sitdown;
use App\Models\Seet;
use App\Models\User;

class SeetController extends Controller
{
    public function index(){

        $seets = Seet::with('user','sitdown')->get();

        return view('seets.index',compact('seets'));
    }

    public function update(Request $request, User $user, Seet $seet,Sitdown $sitdown)
    {
        // 座席者の変更
        if(!(is_null($request->user->id))){
            $seet->user_id = $user->id;
        }

        $seet->save();

        return redirect()->route('seets.index');
    }
}
