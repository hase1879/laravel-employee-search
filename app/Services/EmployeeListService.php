<?php

namespace App\Services;

use Exception;
use App\Enums\SeatStatusEnum;

// 社員一覧表用のデータリストを作成
class EmployeeListService
{

    function employeeList($employees, $dept_keyword)
    {

        foreach ($employees as $employee) {
            $first_dept = $employee->dept->first_dept;
            $second_dept = $employee->dept->second_dept;
            $array = [$first_dept, $second_dept];


            // 「$dept_keywordに値がある」かつ「キーワード一致」すればスキップ
            if ($dept_keyword && (array_search($dept_keyword, $array)) === false) {
                continue;
            }

            // 着席ステータス情報なしの場合、離席（-1）を代入
            $statusNumber = isset($employee->user->sitdown->status) ? $employee->user->sitdown->status : -1;

            // Formによる絞り込み後の、必要データのみ取得
            $employee_list[] = new EmployeeInfoService(
                $employee->user->id,
                $employee->user->profile_picture,
                $employee->user->name,
                $employee->user->furigana,
                $employee->dept->first_dept,
                $employee->dept->second_dept,
                $employee->user->email,
                $employee->user->phone_number,
                $employee->user->mobile_phone_number,
                $seatnumber = isset($employee->user->sitdown->seet->seetnumber) ? $employee->user->sitdown->seet->seetnumber : "-",
                $status = SeatStatusEnum::from($statusNumber)->label(),
                $employee->dept->id,
            );
        }

        // 例外処理　選択した部署に社員不在の場合
        if (!isset($employee_list)) {
            throw new Exception("選択した部署に社員は所属していません。");
        }

        return $employee_list;
    }
}
