<?php

namespace App\Services;

use App\Models\Seet;
use App\Models\Sitdown;
use App\Models\User;

class TreeBranchService {

public $name;
public $groups = [];

function __construct($name){
    $this->name = $name;
}

function getGroup($bushoName){
    // groups[$bushoName]がなければ初期化
    if(!isset($this->groups[$bushoName])){
        $group = new TreeGroupService();
        $group->name = $bushoName;
        $this->groups[$bushoName] = $group;
    }
    return $this->groups[$bushoName];
}

function addEmployee($employee){
    $bushoName = $employee->所属部署;
    $group = $this->getGroup($bushoName);
    $group->addEmployee($employee);
}
}
