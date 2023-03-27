<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }

     public function sendPasswordResetNotification($token) {
         $this->notify(new CustomResetPassword($token));
     }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_picture',
        'user_number',
        'name',
        'furigana',
        'age',
        'date_of_Birth',
        'join_date',
        'gender',
        'email',
        'phone_number',
        'mobile_phone_number',
        'zip_code',
        'present_address',

    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sitdown(){
        return $this->hasOne(Sitdown::class);
    }

    public function seet(){
        return $this->hasOne(Seet::class);
    }

    public function employee(){
        return $this->hasOne(Employee::class);
    }
}
