<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMemberFlagToClassSubscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_subscriptions', function(Blueprint $table){

            $table->boolean('is_member');
            
        });

        Schema::table('game_subscriptions', function(Blueprint $table){

            $table->boolean('is_member');
            
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
