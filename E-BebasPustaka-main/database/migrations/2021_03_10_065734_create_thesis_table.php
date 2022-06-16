<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('status');
            $table->string('institusi');
            $table->string('email');
            $table->string('no_hp');
            $table->string('kategori');
            $table->string('judul');
            $table->string('pengarang');
            $table->string('tahun',4);
            $table->string('link');
            $table->string('keterangan')->nullable();
            $table->boolean('selesai');
            $table->bigInteger('id_pustakawan')->nullable()->unsigned();
            $table->foreign('id_pustakawan')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('thesis');
    }
}
