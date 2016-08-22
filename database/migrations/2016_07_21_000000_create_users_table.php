<?php

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
            $table->string('name',50);
            $table->string('lastname',50);
            $table->string('avatar',50);
            $table->string('email')->unique();
            $table->string('password',75);
            $table->integer('role_id');
            $table->string('trello_id',50)->nullable();
            $table->tinyInteger('must_reset_password')->default(1);
            $table->tinyInteger('status')->default(3);
            $table->tinyInteger('confirmed')->default(0);
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
        Schema::drop('users');
    }
}
