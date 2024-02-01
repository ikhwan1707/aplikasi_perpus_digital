<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_peminjaman', function (Blueprint $table) {
            $table->increments('PeminjamanID');
            $table->integer('UserID')->unsigned()->index();
            $table->foreign('UserID')->references('UserID')->on('tb_user')->onDelete('cascade');
            $table->integer('BukuID');
            $table->foreign('BukuID')->references('BukuID')->on('tb_buku')->onDelete('cascade');
            $table->date('TanggalPeminjaman');
            $table->date('TanggalPengembalian');
            $table->string('StatusPeminjaman',50);
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
        Schema::dropIfExists('tb_peminjaman');
    }
}