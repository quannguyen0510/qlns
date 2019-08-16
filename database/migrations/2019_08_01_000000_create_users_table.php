<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('gender')->default('');
            $table->string('birthday')->default('');
            $table->string('birthplace')->default('');
            $table->string('resident')->default('');
            $table->string('phone')->default('');
            $table->string('avatar')->default('');
            $table->string('nationality')->default('');
            $table->string('daystowork')->default('');
            $table->string('numbercard')->default('');
            $table->string('cmnd')->default('');
            $table->unsignedInteger('id_role')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->foreign('id_role')->references('id')->on('roles')->onDelete('set null');
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
}
