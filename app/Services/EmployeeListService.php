<?php

namespace App\Services;

// 社員一覧表用のデータリストを作成
class EmployeeListService {

function employeeList($employees){



    foreach($employees as $employee){

        // if($sishaName_keyword && strpos($sishaName, $sishaName_keyword) === false){
        //     continue;
        // }

        // if($bushoName_keyword && strpos($bushoName, $bushoName_keyword) === false){
        //     continue;
        // }

        $employee_list[] = new EmployeeInfoService (
            $employee->user->id,
            $employee->user->name,
            $employee->user->furigana,
            $employee->dept->first_dept,
            $employee->dept->second_dept,
            $employee->user->email,
            $employee->user->phone_number,
            $employee->user->mobile_phone_number,
            $seatnumber = isset($employee->user->sitdown->seet->seetnumber) ? $employee->user->sitdown->seet->seetnumber : "離席",
            $status = isset($employee->user->sitdown->status) ? $employee->user->sitdown->status : "-",
        );
    }
    return $employee_list;
}

}
