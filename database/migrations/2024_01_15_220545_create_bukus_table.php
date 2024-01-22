<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->integer('BukuID')->autoIncrement();
            $table->integer('KategoriID');
            $table->string('Judul');
            $table->text('Deskripsi');
            $table->string('Penulis');
            $table->string('Penerbit');
            $table->date('TahunTerbit');
            $table->string('Image')->nullable();
            $table->char('Stock');
            $table->timestamps();

            $table->foreign('KategoriID')->references('KategoriID')->on('tb_kategoribuku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_buku');
    }
}