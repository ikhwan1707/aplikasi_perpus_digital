<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanbukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ulasanbuku', function (Blueprint $table) {
            $table->integer('UlasanID')->autoIncrement();
            $table->unsignedInteger('UserID');
            $table->integer('BukuID');
            $table->text('Ulasan');
            $table->integer('Rating');
            $table->timestamps();

            $table->foreign('UserID')->references('UserID')->on('tb_user')->onDelete('cascade');
            $table->foreign('BukuID')->references('BukuID')->on('tb_buku')->onDelete('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ulasanbuku');
    }
}