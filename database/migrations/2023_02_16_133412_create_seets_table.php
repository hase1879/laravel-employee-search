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
        Schema::create('seets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dept_id')
                ->constrained('depts')
                ->onDelete('cascade')
                ->nullable();
            $table->string('seetnumber')->nullable();

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
        Schema::dropIfExists('seets');
    }
};
