<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('club_id')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('fee_amount')->nullable();
            $table->timestamps();
        });

        Schema::table('classrooms', function(Blueprint $table){

            $table->string('fee_amount')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
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
