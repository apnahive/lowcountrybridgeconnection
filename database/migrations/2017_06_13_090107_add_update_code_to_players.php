<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdateCodeToPlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function(Blueprint $table){

            $table->string('update_code')->nullable();
            $table->string('added_by_unitadmin')->nullable();
            $table->string('added_by_superadmin')->nullable();           

        });

        Schema::create('game_waitlist_subscription', function (Blueprint $table) {
            $table->increments('id');
            $table->string('game_id');
            $table->string('game_waitlist_id');
            $table->string('user_id');
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
        //
    }
}
