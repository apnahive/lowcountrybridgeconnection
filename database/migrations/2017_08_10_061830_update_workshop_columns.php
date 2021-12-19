<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWorkshopColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workshops', function(Blueprint $table){
            $table->boolean('absolute_beginner')->nullable();
            $table->boolean('beginner_plus')->nullable();
            $table->boolean('polish_your_skills')->nullable();
            $table->boolean('competitive_bidding')->nullable();
            $table->boolean('conventions')->nullable();
            $table->boolean('leads')->nullable();
            $table->boolean('defense')->nullable();
            $table->boolean('ph_no_trump')->nullable();
            $table->boolean('ph_suit')->nullable();
            $table->boolean('cuebids')->nullable();
            $table->boolean('over_1')->nullable();
            $table->boolean('doubles')->nullable();
            $table->boolean('counting')->nullable();
            $table->boolean('strayman_transfers')->nullable();
            $table->boolean('other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {               
        
    }
}
