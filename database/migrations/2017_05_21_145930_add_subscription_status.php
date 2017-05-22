<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubscriptionStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_subscriptions', function(Blueprint $table){

            $table->boolean('subscription_status');
            
        });

        Schema::table('game_subscriptions', function(Blueprint $table){

            $table->boolean('subscription_status');
            
        });

        Schema::table('classrooms', function(Blueprint $table){

            $table->string('category_id')->nullable();
            
        });

        Schema::table('games', function(Blueprint $table){

            $table->string('category_id')->nullable();
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
