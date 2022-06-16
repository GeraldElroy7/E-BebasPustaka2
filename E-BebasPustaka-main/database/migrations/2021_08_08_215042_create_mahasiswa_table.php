<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nrp');
            $table->string('email');
            $table->string('nama');
            $table->string('telp')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('departemen')->nullable();
            $table->string('judulTA')->nullable();
            $table->string('status', 1)->default('0');
            $table->boolean('mengajukan')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('mahasiswa');
    }
}
