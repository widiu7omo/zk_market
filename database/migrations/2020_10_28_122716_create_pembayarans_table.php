<?php

/**
 * Laravel Schematics
 *
 * WARNING: removing @tag value will disable automated removal
 *
 * @package Laravel-schematics
 * @author  Maarten Tolhuijs <mtolhuys@protonmail.com>
 * @url     https://github.com/mtolhuys/laravel-schematics
 * @tag     laravel-schematics-pembayarans-model
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', static function (Blueprint $table) {
            $table->increments('id');
            $table->string('metode_pembayaran', 255)->nullable();
            $table->string('status_pembayaran', 255)->nullable();
            $table->string('amount', 255)->nullable();
            $table->string('callback', 255)->nullable();
            $table->string('status_expired', 255)->nullable();
            $table->text('qrstring')->nullable();
            $table->text('bukti')->nullable();
            $table->string('external_id', 255)->nullable();
            $table->unsignedInteger('pesanan_id')->nullable();
            $table->unsignedInteger('metode_id')->nullable();
            $table->foreign('pesanan_id')->references('id')->on('pesanans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('metode_id')->references('id')->on('metode_pembayarans')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
