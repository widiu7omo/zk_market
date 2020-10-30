<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetodePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metode_pembayarans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('metode')->nullable();
            $table->string('token')->nullable();
            $table->string('api')->nullable();
            $table->string('callback')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('metode_pembayarans');
    }
}
