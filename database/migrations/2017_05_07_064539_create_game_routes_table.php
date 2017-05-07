<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->timestamps();
        });

        Schema::table('game_routes', function (Blueprint $table) {

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
        Schema::dropIfExists('game_routes');
        Schema::table('game_routes', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
    }
}
