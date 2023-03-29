<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function mypage(){
        $user = Auth::user();

        return view("users.mypage", compact("user"));
    }

    public function edit(User $user)
    {
        $user = Auth::user();

        return view("users.edit", compact("user"));
    }

    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        $user->furigana = $request->input('furigana') ? $request->input('furigana') : $user->furigana;
        $user->age = $request->input('age') ? $request->input('age') : $user->age;
        $user->date_of_Birth = $request->input('date_of_Birth') ? $request->input('date_of_Birth') : $user->date_of_Birth;
        $user->join_date = $request->input('join_date') ? $request->input('join_date') : $user->join_date;
        $user->gender = $request->input('gender') ? $request->input('gender') : $user->gender;
        $user->phone_number = $request->input('phone_number') ? $request->input('phone_number') : $user->phone_number;
        $user->mobile_phone_number = $request->input('mobile_phone_number') ? $request->input('mobile_phone_number') : $user->mobile_phone_number;
        $user->zip_code = $request->input('zip_code') ? $request->input('zip_code') : $user->zip_code;
        $user->present_address = $request->input('present_address') ? $request->input('present_address') : $user->present_address;

        $user->update();

        return to_route('mypage');
    }

    public function update_password(Request $request)
     {
         $user = Auth::user();

         if ($request->input('password') == $request->input('password_confirmation')) {
             $user->password = bcrypt($request->input('password'));
             $user->update();
         } else {
             return to_route('mypage.edit_password');
         }

         return to_route('mypage');
     }

     public function edit_password()
     {
         return view('users.edit_password');
     }
}
