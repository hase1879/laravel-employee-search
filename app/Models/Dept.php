<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    use HasFactory;

    public function employee(){
        return $this->hasMany(Employee::class);
    }

    public function seet(){
        return $this->hasMany(Seet::class);
    }
}
