<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPlayerss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::table('players', function(Blueprint $table){

            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('zipgroup')->nullable();
            $table->string('mailing_options')->nullable();
            $table->string('master_points')->nullable();
            $table->string('skill_level')->nullable();
            $table->string('play_frequency')->nullable();
            $table->string('class_level')->nullable();
            $table->boolean('new_partner_interested')->nullable();
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
