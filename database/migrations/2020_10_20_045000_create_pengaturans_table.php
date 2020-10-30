<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengaturansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('nama_bisnis')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('tipe_ongkir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('google_api')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pengaturans');
    }
}
