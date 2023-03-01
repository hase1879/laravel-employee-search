<?php

namespace App\Services;

use App\Models\User;
use App\Models\Employee;

class TreeDataEmployeeService {


    public function treedata($employees){
        $tree = $employees->groupBy("所属支社")->map(function($collection){
        return $collection->groupBy("所属部署");
        });

        return $tree;
    }

}
