<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->default('');
            $table->string('user_number')->nullable();

            $table->string('name');
            $table->string('furigana')->nullable();;
            $table->string('age')->nullable();;
            $table->string('date_of_Birth')->nullable();;
            $table->string('join_date')->nullable();;
            $table->string('gender')->nullable();;
            $table->string('email')->unique()->nullable();;
            $table->string('phone_number')->nullable();;
            $table->string('mobile_phone_number')->nullable();;
            $table->string('zip_code')->nullable();;
            $table->string('present_address')->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
