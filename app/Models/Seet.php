<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seet extends Model
{
    use HasFactory;

    protected $fillable = [
        'seetnumber',
    ];

    public function sitdown(){
        return $this->hasOne(Sitdown::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dept(){
        return $this->belongsTo(Dept::class);
    }


}
