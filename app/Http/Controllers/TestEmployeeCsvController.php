<?php

namespace App\Http\Controllers;

use App\Models\Emoloyee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestEmployeeCsvController extends Controller
{

    public function testEmployeeDataList()
    {
        $shishaNames = array(
            "東京支社",
            "大阪支社",
            "名古屋支社",
            "仙台支社",
        );

        $bushoNames = array(
            "総務部総務課"    => 10,
            "総務部会計課"    => 10,
            "人事部人事課"    => 20,
            "製造部設計課"  => 20,
            "製造部生産管理課"  => 10,
            "営業部営業一課"  => 20,
            "営業部営業二課"  => 10,
        );

        function array_rand_weighted_busho($bushoNames){
            $sum  = array_sum($bushoNames);
            $rand = rand(1, $sum);

            foreach($bushoNames as $key => $weight){
                // 確率計算
                if (($sum -= $weight) < $rand) return $key;
            }
        }


        $employees = [];
        $total = 0;

        foreach($shishaNames as $shishaName){
            for($i=0; $i<25; $i++){
                $bushoName = array_rand_weighted_busho($bushoNames);
                $employees[] =[$shishaName => $bushoName];
                $total += 1;
                // dump($total);

            }
        }



        return view('test-employee-list', compact('employees'));
    }

}
