<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task',50);
            $table->text('description');
            $table->integer('status')->default(1);
            $table->integer('requestor_id');
            $table->integer('supervisor_id')->nullable();
            $table->integer('developer_id')->nullable();
            $table->integer('lead_project_id')->nullable();
            $table->integer('chief_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('priority');
            $table->dateTime('request_date');
            $table->dateTime('lead_project_approval_date')->nullable();
            $table->dateTime('chief_approval_date')->nullable();
            $table->dateTime('supervisor_assignment_date')->nullable();
            $table->dateTime('developer_assignment_date')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->text('observations');
            $table->string('trello_card_id',50)->nullable();
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
        Schema::drop('tasks');
    }
}
