<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ask', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('status');
            $table->string('email');
            $table->string('no_hp');
            $table->string('kategori');
            $table->string('pertanyaan');
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
        Schema::dropIfExists('ask');
    }
}
