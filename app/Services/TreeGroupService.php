<?php

namespace App\Services;

use App\Models\Seet;
use App\Models\Sitdown;
use App\Models\User;

// 各employeeレコードを代入
class TreeGroupService {

    public $name;
    public $employees;

    function addEmployee($employee){
        $this->employees[] = $employee;
    }
}
