<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_status_id');
            $table->integer('user_role_id');
            $table->integer('edit');
            $table->integer('delete');
            $table->integer('send');
            $table->integer('approve');
            $table->integer('assign');
            $table->integer('authorize');
            $table->integer('reject');
            $table->integer('complete');
            $table->integer('status')->default(1);
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
        Schema::drop('tasks_permissions');
    }
}
