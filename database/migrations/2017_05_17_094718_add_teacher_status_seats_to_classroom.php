<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeacherStatusSeatsToClassroom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table('classrooms', function(Blueprint $table){

            $table->string('classroom_id');
            $table->string('teacher_id');
            $table->boolean('class_status');
            $table->integer('seats_booked');
            $table->integer('seats_available');
        });

        Schema::create('class_subscription', function (Blueprint $table) {
            $table->increments('id');
            $table->string('classroom_id');
            $table->string('subscription_id');
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
