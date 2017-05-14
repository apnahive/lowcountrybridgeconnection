<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_name');
            $table->string('club_name');
            $table->text('class_description');
            $table->date('class_from');
            $table->date('class_till');
            $table->integer('class_size');
            $table->integer('club_id')->unsigned()->index();
            $table->string('payment_option');
            $table->string('class_flyer_address');
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
        Schema::dropIfExists('classes');
    }
}
