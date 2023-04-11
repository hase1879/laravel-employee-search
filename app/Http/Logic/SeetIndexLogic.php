<?php

namespace App\Http\Logic;

use App\Models\Dept;
use App\Models\Employee;
use App\Services\MapBoxService;


class SeetIndexLogic {

    function search($dept_id){

        //メインロジック(1) Treeの構築
        $tree = $this->getEmployeeTree($dept_id);
        $dept = $this->getDept($dept_id);

        //メインロジック(2) 座席情報の構築
        $map_image = $dept->map_image;
        $box_list = $this->getBoxList($dept);

        //Viewを構築するための変数の準備
        $depts = Dept::all();

        return [
            'tree' => $tree,
            'box_list' => $box_list,
            'depts' => $depts,
            'map_image' => $map_image
        ];
    }

    function getEmployeeTree($dept_id_keyword){

        $tree = [];

        $employees = Employee::all();

        foreach($employees as $employee){
            $first_dept = $employee->dept->first_dept;
            $second_dept = $employee->dept->second_dept;

            if (strpos($dept_id_keyword, $employee->dept->id) === false) {
                continue;
            }

            // 変数をifで条件付けしてそれぞれ作成
            if(!isset($tree[$first_dept]))$tree[$first_dept] = [];
            if(!isset($tree[$first_dept][$second_dept]))$tree[$first_dept][$second_dept] = [];
            $tree[$first_dept][$second_dept][] = $employee;
        }

        return $tree;

    }

    function getDept($dept_id){
        //return Dept::where("id","=",$dept_id)->first();
        return Dept::find($dept_id);
    }

    function getBoxList($dept){

        $box_list = [];

        // 座席表データリストの作成
        if(isset($dept->seet)){
            foreach($dept->seet as $seat){
                $box_list[] = new MapBoxService(
                    $seat->seetnumber,
                    $user_name = isset($seat->sitdown->user->name) ? $seat->sitdown->user->name : '空席',
                    $seat->width,
                    $seat->height,
                    $seat->top,
                    $seat->left,
                    $seat_status = isset($seat->sitdown->status) ? $seat->sitdown->status : 'null',
                    $seat->id
                );
            }
        }

        return $box_list;
    }
}
