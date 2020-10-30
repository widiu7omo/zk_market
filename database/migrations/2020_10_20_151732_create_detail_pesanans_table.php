<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pesanan_id')->unsigned();
            $table->integer('produk_id')->unsigned();
            $table->string('jumlah')->nullable();
            $table->string('subtotal')->nullable();
            $table->foreign('pesanan_id')->references('id')->on('pesanans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_pesanans');
    }
}
