<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

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
        $grid->column('profile_picture', __('Profile picture'));
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
        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function($filter){
            $filter->like('name', '氏名');
            $filter->between('created_at', '登録日')->datetime();
        });

        return $grid;
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
        $show->field('profile_picture', __('Profile picture'));
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
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
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
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
