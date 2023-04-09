<?php

namespace App\Services;

// 社員一覧表用のデータ名を作成
class EmployeeInfoService {

    // 変数宣言
    function __construct(
        public $id,
        public $profile_picture,
        public $name,
        public $furigana,
        public $first_dept,
        public $second_dept,
        public $email,
        public $phone_number,
        public $mobile_phone_number,
        public $seatnumber,
        public $status,
        public $dept_id,
    ){

    }
}
