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
            $table->text('desc')->nullable();
            $table->string('kode')->nullable();
            $table->text('icon')->nullable();
            $table->enum('status',['0','1'])->default('1');
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
