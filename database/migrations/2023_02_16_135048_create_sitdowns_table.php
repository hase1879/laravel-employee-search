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
        Schema::create('sitdowns', function (Blueprint $table) {
            $table->id();

            $table->foreignID('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignID('seet_id')
                ->constrained('seets')
                ->onDelete('cascade');

            $table->string('status')->nullable();

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
        Schema::dropIfExists('sitdowns');
    }
};
