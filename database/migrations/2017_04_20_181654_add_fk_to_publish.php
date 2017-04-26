<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPublish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publishes', function (Blueprint $table) {

            $table->unsignedInteger('game_id');
            $table->foreign('game_id')
                  ->references('id')
                  ->on('games')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publishes', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
    }
}
