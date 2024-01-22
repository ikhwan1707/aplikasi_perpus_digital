<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('UserID');
            $table->foreign('UserID')->references('UserID')->on('tb_user')->onDelete('cascade');
            $table->integer('BukuID');
            $table->foreign('BukuID')->references('BukuID')->on('tb_buku')->onDelete('cascade');

            $table->date('rent_date');
            $table->date('return_date');
            $table->date('actual_return_date')->nullable();
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
        Schema::dropIfExists('rent_logs');
    }
}