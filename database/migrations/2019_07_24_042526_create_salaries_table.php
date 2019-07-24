<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user');
            $table->unsignedInteger('year');
            $table->unsignedInteger('month');
            $table->integer('day_worked');
            $table->integer('bonus_project');
            $table->integer('total');
            $table->string('checklist');
            $table->primary(['id_user', 'year', 'month']);
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('salaries');
    }
}
