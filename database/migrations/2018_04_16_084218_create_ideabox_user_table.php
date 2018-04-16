<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeaboxUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideabox_user', function (Blueprint $table) {
            $table->integer('ideabox_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('ideabox_id')->references('id')->on('ideabox');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideabox_user');
    }
}
