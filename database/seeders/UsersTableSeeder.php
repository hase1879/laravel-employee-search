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
        const CSV_FILENAME = '/../database/seeders/users_dummy.csv';

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
                        'user_number' => $row[1],
                        'name' => $row[2],
                        'furigana' => $row[3],
                        'age' => $row[4],
                        'date_of_Birth' => $row[5],
                        'join_date' => $row[6],
                        'gender' => $row[7],
                        'email' => $row[8],
                        'phone_number' => $row[9],
                        'mobile_phone_number' => $row[10],
                        'zip_code' => $row[11],
                        'present_address' => $row[12],
                        'id' => $row[14],
                        'password' => $row[15],

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
