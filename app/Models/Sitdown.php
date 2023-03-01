<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitdown extends Model
{
    const STATUS_CHAKUSEKI = 1;
    const STATUS_KAIGI = 2;
    const STATUS_RISEKI = 3;

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function seet(){
        return $this->belongsTo(Seet::class);
    }
}
