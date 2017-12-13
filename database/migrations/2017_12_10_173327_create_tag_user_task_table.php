<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagUserTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_user_task', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->integer('user_task_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            # Make foreign keys
            $table->foreign('user_task_id')->references('id')->on('user_tasks');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tag_user_task');
    }
}
