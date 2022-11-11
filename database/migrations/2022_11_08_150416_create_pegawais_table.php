<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama_pegawai', 100)->nullable();
            $table->string('no_whatsapp',12)->nullable();
            $table->string('bagian',200)->nullable();                    
            $table->unsignedBigInteger('id_kebutuhan'); 
            $table->foreign('id_kebutuhan')->references('id_kebutuhan')->on('kebutuhans');
            $table->unsignedBigInteger('id_kategori'); 
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
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
        Schema::dropIfExists('pegawais');
    }
};
