<?php

namespace App\Services;

// 社員一覧表用のデータ名を作成
class EmployeeInfoService {

    function __construct(
        public $id,
        public $name,
        public $furigana,
        public $shisha_name,
        public $busho_name,
        public $email,
        public $phone_number,
        public $mobile_phone_number,
        public $seatnumber,
        public $status,
    ){

    }
}
