<?php

namespace App\Services;

use App\Models\User;
use App\Models\Employee;

class SearchEmployeeService {

    // 社員検索機能
    public function search($keyword){

        if(is_null($keyword)){
            $user_results = User::with('employee')->get();
        }else{
            $user_results = User::with('employee')->where('name','like', '%'.$keyword.'%')->get();
        }

        return $user_results;
    }

}
