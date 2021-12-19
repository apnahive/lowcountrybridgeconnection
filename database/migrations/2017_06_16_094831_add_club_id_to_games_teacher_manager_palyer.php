<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClubIdToGamesTeacherManagerPalyer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('games', function(Blueprint $table){

            $table->string('club_id')->nullable();
        });

        Schema::table('managers', function(Blueprint $table){

            $table->string('club_id')->nullable();
        });

        Schema::table('teachers', function(Blueprint $table){

            $table->string('club_id')->nullable();
        });

        Schema::table('players', function(Blueprint $table){

            $table->string('club_id')->nullable();
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
    }
}
