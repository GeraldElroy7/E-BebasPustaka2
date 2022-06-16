<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')
                    ->constrained('mahasiswa')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                    
            $table->integer('id_opr_publish')->nullable();
            $table->string('opr_publish')->nullable();
            $table->date('tgl_publish')->nullable();

            $table->integer('id_opr_validasi')->nullable();
            $table->string('opr_validasi')->nullable();
            $table->date('tgl_validasi')->nullable();
            
            $table->integer('id_opr_aktivasi')->nullable();
            $table->string('opr_aktivasi')->nullable();
            $table->date('tgl_aktivasi')->nullable();
            
            $table->integer('id_opr_terima_ta')->nullable();
            $table->string('opr_terima_ta')->nullable();
            $table->date('tgl_terima_ta')->nullable();

            $table->integer('id_opr_bp')->nullable();
            $table->string('opr_bp')->nullable();
            $table->date('tgl_bp')->nullable();
            
            $table->string('link_repo')->nullable();
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
        Schema::dropIfExists('ajuan');
    }
}
