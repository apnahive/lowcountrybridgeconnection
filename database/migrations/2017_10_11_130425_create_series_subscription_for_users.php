<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesSubscriptionForUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('subscription_id');
            $table->string('series_id');
            $table->boolean('subscription_status');
            $table->boolean('is_member');
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
