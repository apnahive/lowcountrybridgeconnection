<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('game_id');
            $table->string('subscription_id');
            $table->string('user_id');
            $table->timestamps();
        });

        Schema::create('class_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
            $table->timestamps();
        });

        Schema::table('games', function(Blueprint $table){

            $table->string('classroom_id');
            $table->string('manaer_id');
            $table->boolean('game_status');
            $table->integer('seats_booked');
            $table->integer('seats_available');
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
