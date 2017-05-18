<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeUsertableFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function(Blueprint $table){

            $table->string('lastname')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('zipcode')->nullable()->change();
            $table->string('zipgroup')->nullable()->change();
            $table->string('mailing_options')->nullable()->change();
            $table->string('acbl')->nullable()->change();
            $table->string('master_points')->nullable()->change();
            $table->string('skill_level')->nullable()->change();
            $table->string('play_frequency')->nullable()->change();
            $table->string('class_level')->nullable()->change();
            $table->string('update_code')->nullable()->change();
            $table->boolean('updated_by_admin')->nullable()->change();
            $table->boolean('updated_by_member')->nullable()->change();
            $table->boolean('new_partner_interested')->nullable()->change();
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
