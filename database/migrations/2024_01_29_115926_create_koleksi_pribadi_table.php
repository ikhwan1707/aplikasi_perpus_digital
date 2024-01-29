<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoleksiPribadiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_koleksi_pribadi', function (Blueprint $table) {
            $table->increments('KoleksiID');
            $table->integer('UserID')->unsigned()->index();
            $table->foreign('UserID')->references('UserID')->on('tb_user')->onDelete('cascade');;
            $table->integer('BukuID');
            $table->foreign('BukuID')->references('BukuID')->on('tb_buku')->onDelete('cascade');;
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
        Schema::dropIfExists('tb_koleksi_pribadi');
    }
}