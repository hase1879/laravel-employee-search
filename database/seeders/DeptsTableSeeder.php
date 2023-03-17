<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Dept;

// Goodby\CSVを使用
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class DeptsTableSeeder extends Seeder
{
        //appからの相対パス(CSVデータ)
        const CSV_FILENAME = '/../database/seeders/dept_dummy.csv';

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $this->command->info('[Start] import data.');

            $config = new LexerConfig();
            // セパレーター指定、"\t"を指定すればtsvファイルとかも取り込めます
            $config->setDelimiter(",");
            // 1行目をスキップ
            $config->setIgnoreHeaderLine(true);
            $lexer = new Lexer($config);
            $interpreter = new Interpreter();
            $interpreter->addObserver(function(array $row) {
                // 登録処理
                $dept = Dept::create([
                        'dept_number' => $row[0],
                        'first_dept' => $row[1],
                        'second_dept' => $row[2],
                   ]);
            });

            $lexer->parse(app_path() . self::CSV_FILENAME, $interpreter);

            $this->command->info('[End] import data.');
        }


}
