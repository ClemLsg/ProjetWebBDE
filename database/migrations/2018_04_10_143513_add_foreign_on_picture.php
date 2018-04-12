<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignOnPicture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pictures', function (Blueprint $table) {
            $table->integer('activitie_id')->unsigned()->nullable();
            $table->foreign('activitie_id')->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('pictures', function (Blueprint $table) {
            $table->dropColumn('activitie_id');
            $table->dropForeign('activitie_id');
        });
    }
}
