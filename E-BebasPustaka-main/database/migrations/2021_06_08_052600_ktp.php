<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ktp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('resource', function (Blueprint $table) {
        //     $table->string('ktp');
        //     $table->string('size');
        // });
        Schema::table('thesis', function (Blueprint $table) {
            $table->string('ktp');
            $table->string('size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('resource', function (Blueprint $table) {
        //     $table->dropColumn('ktp');
        //     $table->dropColumn('size');
        // });
        Schema::table('thesis', function (Blueprint $table) {
            $table->dropColumn('ktp');
            $table->dropColumn('size');
        });
    }
}
