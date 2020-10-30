<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nama')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('harga_promo')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('gambar')->nullable();
            $table->unsignedInteger('kategori_id');
            $table->string('terlaris')->nullable();
            $table->string('promosi')->nullable();
            $table->string('status')->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produks');
    }
}
