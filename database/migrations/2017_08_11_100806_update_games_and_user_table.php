<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGamesAndUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::table('games', function(Blueprint $table){

            $table->boolean('tournament')->nullable();
          });

         Schema::table('users', function(Blueprint $table){

            $table->renameColumn('class_level', 'attended_classes');
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
