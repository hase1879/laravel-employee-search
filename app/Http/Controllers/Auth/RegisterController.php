<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'user_number' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'furigana' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'age' => ['required', 'string'],
            'date_of_Birth' => ['required', 'string'],
            'join_date' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'mobile_phone_number' => ['required', 'string'],
            'zip_code' => ['required', 'string'],
            'present_address' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            // 'user_number' => $data['user_number'],
            'name' => $data['name'],
            'furigana' => $data['furigana'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'age' => $data['age'],
            'date_of_Birth' => $data['date_of_Birth'],
            'join_date' => $data['join_date'],
            'gender' => $data['gender'],
            'phone_number' => $data['phone_number'],
            'mobile_phone_number' => $data['mobile_phone_number'],
            'zip_code' => $data['zip_code'],
            'present_address' => $data['present_address'],
        ]);
    }
}
