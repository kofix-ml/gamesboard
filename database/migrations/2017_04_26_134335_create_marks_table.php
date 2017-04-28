<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('round')->nullable();
            $table->timestamps();
        });

        Schema::table('marks', function (Blueprint $table) {

            $table->unsignedInteger('game_id');
            $table->unsignedInteger('player_id');

            $table->foreign('game_id')
                  ->references('id')
                  ->on('games')
                  ->onDelete('cascade');

            $table->foreign('player_id')
                  ->references('id')
                  ->on('players')
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
        Schema::dropIfExists('marks');
        Schema::table('marks', function (Blueprint $table) {
            $table->dropColumn('game_id');
            $table->dropColumn('player_id');
        });
    }
}
