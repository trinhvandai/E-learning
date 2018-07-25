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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('personal_info')->nullable();
            $table->string('working_place')->nullable();
            $table->tinyInteger('learning_capacity')->nullable();
            $table->tinyInteger('conduct')->nullable();
            $table->tinyInteger('grade')->nullable();
            $table->tinyInteger('role');
            $table->timestamp('last_login')->nullable();
            $table->string('deleted_at')->nullable();
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
}
