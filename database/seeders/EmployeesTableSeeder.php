<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\User;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $shishaNames = array(
            "東京支社",
            "大阪支社",
            "名古屋支社",
            "仙台支社",
        );

        $bushoNames = array(
            "総務部"    => 20,
            "会計部"    => 10,
            "人事部"    => 20,
            "設計部"  => 20,
            "生産管理部"  => 10,
            "営業部"  => 20,
        );

        function array_rand_weighted_busho($bushoNames){
            $sum  = array_sum($bushoNames);
            $rand = rand(1, $sum);

            foreach($bushoNames as $key => $weight){
                // 確率計算
                if (($sum -= $weight) < $rand) return $key;
            }
        }

        // ランダムデータ生成し、EmployeesTableに登録。
        $total = 0;
        foreach($shishaNames as $shishaName){
            for($i=0; $i<24; $i++){
                $bushoName = array_rand_weighted_busho($bushoNames);
                $total += 1;
                Employee::create([
                        'user_id' => $total,
                        '所属支社' => $shishaName,
                        '所属部署' => $bushoName,
                ]);
            }
        }

    }
}
