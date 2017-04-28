<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::table('game_agents', function (Blueprint $table) {

            $table->unsignedInteger('game_id');
            $table->unsignedInteger('user_id');

            $table->foreign('game_id')
                  ->references('id')
                  ->on('games')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('game_agents');
        Schema::table('game_agents', function (Blueprint $table) {
            $table->dropColumn('game_id');
            $table->dropColumn('user_id');
        });
    }
}
