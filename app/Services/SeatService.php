<?php

namespace App\Services;

use App\Models\Seet;
use App\Models\Sitdown;
use App\Models\User;
// 例外処理用
use Exception;
use Ramsey\Uuid\Type\Integer;

enum SeatStatusEnum: int
{
    case 着席 = 1;
    case 会議中 = 2;
    case 一時離席 = 3;
    case 離席 = -1;
}

class SeatService {

    function __construct(private User $user)
    {

    }

    function updateStatus(Seet $seat, $status_number){

        $status = SeatStatusEnum::from($status_number);

        if ($status == SeatStatusEnum::着席){
            $this->着席($this->user, $seat);
        }elseif ($status == SeatStatusEnum::会議中){
            $this->会議中に変更($this->user, $seat);
        }elseif ($status == SeatStatusEnum::一時離席){
            $this->一時的に離席した($this->user, $seat);
        }else{
            $this->離席($this->user, $seat);
        }

    }

    function is着席中(User $user) : Bool {

        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        if(is_null($着席情報)){
            return false;
        }

        return true;
    }

    function 着席(User $user, Seet $seat){

        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        if(is_null($着席情報)){
            $着席情報 = new Sitdown();
        }

        // 例外処理
        $seat_user = Sitdown::where("seet_id","=",$seat->id)->first();
        if(isset($seat_user)){
            throw new Exception("既に座っている人がいますが、着席しますか？");
        }

        $着席情報->user_id = $user->id;
        $着席情報->seet_id = $seat->id;
        $着席情報->status = Sitdown::STATUS_CHAKUSEKI;
        $着席情報->save();

        //$着席情報 = Sitdown::where("user_id","=",$user->id)->firstOrNew();
    }

    function 会議中に変更(User $user){

        if(!$this->is着席中($user)){
            // throw new Exception("着席していません");
            session()->flash('flash_message_notchakuseki', '着席していません');
        }else{
        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        $着席情報->status = Sitdown::STATUS_KAIGI;
        $着席情報->save();
        }
    }

    function 一時的に離席した(User $user){

        if(!$this->is着席中($user)){
            // throw new Exception("着席していません");
            session()->flash('flash_message_notchakuseki', '着席していません');
        }else{
        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        $着席情報->status = Sitdown::STATUS_RISEKI;
        $着席情報->save();
        }
    }

    function 離席(User $user){

        if(!$this->is着席中($user)){
            // throw new Exception("着席していません");
            session()->flash('flash_message_notchakuseki', '着席していません');
        } else {
        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        $着席情報->delete();
        }
    }

}
