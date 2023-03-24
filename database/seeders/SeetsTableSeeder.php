<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seet;
use App\Models\User;

// Goodby\CSVを使用
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class SeetsTableSeeder extends Seeder
{
    //appからの相対パス(CSVデータ)
    const CSV_FILENAME = '/../database/seeders/seats_dummy.csv';

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
            // 該当テーブルへの登録処理
            $seets = Seet::create([
                    'seetnumber' => $row[0],
                    'width' => $row[1],
                    'height' => $row[2],
                    'top' => $row[3],
                    'left' => $row[4],
               ]);
        });

        $lexer->parse(app_path() . self::CSV_FILENAME, $interpreter);

        $this->command->info('[End] import data.');

    }

}

            // Seet::create([
            //     'seetnumber' => 'A-1',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 53,
            //     'left' => 176,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-2',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 53,
            //     'left' => 268,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-3',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 53,
            //     'left' => 427,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-4',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 53,
            //     'left' => 519,

            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-5',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 53,
            //     'left' => 675,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-6',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 53,
            //     'left' => 767,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-7',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 143,
            //     'left' => 176,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-8',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 143,
            //     'left' => 268,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-9',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' =>143,
            //     'left' => 427,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-10',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' =>143,
            //     'left' => 519,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-11',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 143,
            //     'left' => 675,
            // ]);

            // Seet::create([
            //     'seetnumber' => 'A-12',
            //     'width' => 85,
            //     'height' => 83,
            //     'top' => 143,
            //     'left' => 767,

            // ]);
