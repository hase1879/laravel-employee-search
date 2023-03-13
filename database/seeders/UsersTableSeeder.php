<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

// Goodby\CSVを使用
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class UsersTableSeeder extends Seeder
{
        //appからの相対パス(CSVデータ)
        const CSV_FILENAME = '/../database/seeds/users_dummy.csv';

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
                $user = User::create([
                        'profile_picture' => $row[0],
                        'name' => $row[1],
                        'furigana' => $row[2],
                        'age' => $row[3],
                        'date_of_Birth' => $row[4],
                        'join_date' => $row[5],
                        'gender' => $row[6],
                        'email' => $row[7],
                        'phone_number' => $row[8],
                        'mobile_phone_number' => $row[9],
                        'zip_code' => $row[10],
                        'present_address' => $row[11],

                   ]);
            });

            $lexer->parse(app_path() . self::CSV_FILENAME, $interpreter);

            $this->command->info('[End] import data.');
        }


}

/**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {

    //     User::create([
    //         'name' => '丸山 未希子',
    //         'email' => 'test1231@example.com',
    //         'password' => 'test1231',
    //     ]);

    //     User::create([
    //         'name' => '樋浦 圭',
    //         'email' => 'test1232@example.com',
    //         'password' => 'test1232',
    //     ]);

    //     User::create([
    //         'name' => '田口 舞子',
    //         'email' => 'test1233@example.com',
    //         'password' => 'test1233',
    //     ]);

    //     User::create([
    //         'name' => '八尾 努',
    //         'email' => 'test1234@example.com',
    //         'password' => 'test1234',
    //     ]);

    //     User::create([
    //         'name' => '田辺 舞',
    //         'email' => 'test1235@example.com',
    //         'password' => 'test1235',
    //     ]);

    //     User::create([
    //         'name' => '八 剛',
    //         'email' => 'test1236@example.com',
    //         'password' => 'test1236',
    //     ]);


    // }
