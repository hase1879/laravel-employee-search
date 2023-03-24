<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\User;
use App\Models\Dept;

// Goodby\CSVを使用
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class EmployeesTableSeeder extends Seeder
{
       //appからの相対パス(CSVデータ)
    //    const CSV_FILENAME = '/../database/seeders/users_dummy.csv';

       /**
        * Run the database seeds.
        *
        * @return void
        */
       public function run()
       {

            for ($num = 1; $num < 98; $num++){
                $employee = Employee::create([
                'user_id' => $num,
                'dept_id' => rand(1, 13),
                ]);
            }
       }

}
