<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('waktu_pesan')->nullable();
            $table->string('waktu_sampai')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('total_bayar')->nullable();
            $table->string('catatan')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('status_pesanan_id')->unsigned();
            $table->integer('status_bayar_id')->unsigned();
            $table->foreign('status_pesanan_id')->references('id')->on('status_pesanans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_bayar_id')->references('id')->on('status_bayars')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pesanans');
    }
}
