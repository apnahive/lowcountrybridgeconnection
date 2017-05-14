<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){

            $table->string('lastname');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('zipgroup');
            $table->string('mailing_options');
            $table->string('acbl');
            $table->string('master_points');
            $table->string('skill_level');
            $table->string('play_frequency');
            $table->string('class_level');
            $table->string('update_code');
            $table->boolean('updated_by_admin');
            $table->boolean('updated_by_member');
            $table->boolean('new_partner_interested');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            $table->dropColumn('lastname');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zipcode');
            $table->dropColumn('zipgroup');
            $table->dropColumn('mailing_options');
            $table->dropColumn('acbl');
            $table->dropColumn('master_points');
            $table->dropColumn('skill_level');
            $table->dropColumn('play_frequency');
            $table->dropColumn('class_level');
            $table->dropColumn('update_code');
            $table->dropColumn('updated_by_admin');
            $table->dropColumn('updated_by_member');
            $table->dropColumns('new_partner_interested');
    }
}
