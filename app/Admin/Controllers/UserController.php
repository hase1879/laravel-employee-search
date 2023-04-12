<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

// CSV機能
use App\Admin\Extensions\Tools\CsvImport;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;
use Illuminate\Http\Request;


class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('profile_picture', __('Profile picture'))->image();
        $grid->column('user_number', __('User number'));
        $grid->column('name', __('Name'));
        $grid->column('furigana', __('Furigana'));
        $grid->column('age', __('Age'));
        $grid->column('date_of_Birth', __('Date of Birth'));
        $grid->column('join_date', __('Join date'));
        $grid->column('gender', __('Gender'));
        $grid->column('email', __('Email'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('mobile_phone_number', __('Mobile phone number'));
        $grid->column('zip_code', __('Zip code'));
        $grid->column('present_address', __('Present address'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function ($filter) {
            $filter->like('name', '氏名');
            $filter->between('created_at', '登録日')->datetime();
        });

        // CSVデータ
        $grid->tools(function ($tools) {
            $tools->append(new CsvImport());
        });

        return $grid;
    }

    // CSVデータ
    public function csvImport(Request $request)
    {
        $file = $request->file('file');


        $lexer_config = new LexerConfig();

        // 1行目をスキップ
        $lexer_config->setIgnoreHeaderLine(true);

        $lexer = new Lexer($lexer_config);

        $interpreter = new Interpreter();
        $interpreter->unstrict();

        $rows = array();
        $interpreter->addObserver(function (array $row) use (&$rows) {
            $rows[] = $row;
        });

        $counts = [
            "create" => 0,
            "skip" => 0,
            "__debug" => []
        ];

        $lexer->parse($file, $interpreter);
        foreach ($rows as $key => $value) {

            //CSVの項目数チェック
            if (count($value) < 16) {
                continue;
            }

            //名前が入力されていないデータを省く
            if (strlen($value[2]) < 1) {
                continue;
            }

            //メールアドレスの重複チェック
            $isExist = User::where('email',"=",$value[8])->first();
            if ($isExist) {
                continue;
            }

            User::create([
                'profile_picture' => $value[0],
                'user_number' => $value[1],
                'name' => $value[2],
                'furigana' => $value[3],
                'age' => $value[4],
                'date_of_Birth' => $value[5],
                'join_date' => $value[6],
                'gender' => $value[7],
                'email' => $value[8],
                'phone_number' => $value[9],
                'mobile_phone_number' => $value[10],
                'zip_code' => $value[11],
                'present_address' => $value[12],
                'password' => $value[15],
            ]);
            $counts["create"]++;

        }

        return response()->json(
            ['data' => '成功', 'counts' => $counts],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('profile_picture', __('Profile picture'))->image();
        $show->field('user_number', __('User number'));
        $show->field('name', __('Name'));
        $show->field('furigana', __('Furigana'));
        $show->field('age', __('Age'));
        $show->field('date_of_Birth', __('Date of Birth'));
        $show->field('join_date', __('Join date'));
        $show->field('gender', __('Gender'));
        $show->field('email', __('Email'));
        $show->field('phone_number', __('Phone number'));
        $show->field('mobile_phone_number', __('Mobile phone number'));
        $show->field('zip_code', __('Zip code'));
        $show->field('present_address', __('Present address'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('profile_picture', __('Profile picture'));
        $form->text('user_number', __('User number'));
        $form->text('name', __('Name'));
        $form->text('furigana', __('Furigana'));
        $form->text('age', __('Age'));
        $form->text('date_of_Birth', __('Date of Birth'));
        $form->text('join_date', __('Join date'));
        $form->text('gender', __('Gender'));
        $form->email('email', __('Email'));
        $form->text('phone_number', __('Phone number'));
        $form->text('mobile_phone_number', __('Mobile phone number'));
        $form->text('zip_code', __('Zip code'));
        $form->text('present_address', __('Present address'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
