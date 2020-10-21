<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->longText('proyect_id');
            $table->integer('user_id')->unsigned();
            $table->integer('days')->unsigned()->nullable();
            $table->integer('hours')->unsigned()->nullable();

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('proyect_id')->references('id')->on('projects');
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('tasks');
    }
}
