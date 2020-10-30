<?php

/**
 * Laravel Schematics
 *
 * WARNING: removing @tag value will disable automated removal
 *
 * @package Laravel-schematics
 * @author  Maarten Tolhuijs <mtolhuys@protonmail.com>
 * @url     https://github.com/mtolhuys/laravel-schematics
 * @tag     laravel-schematics-pesanans-model
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedAlamatIdAndPegawaiIdDeletedLongAndLatAndKeteranganAndCustomerIdColumnInPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanans', static function (Blueprint $table) {
            $table->integer('alamat_id')->unsigned()->nullable();
            $table->integer('pegawai_id')->unsigned()->nullable();
            $table->dropColumn('long');
            $table->dropColumn('lat');
            $table->dropColumn('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanans', static function (Blueprint $table) {
            $table->string('long', 255)->nullable();
            $table->string('lat', 255)->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->integer('customer_id', 10)->nullable();
            $table->dropColumn('alamat_id');
            $table->dropColumn('pegawai_id');
        });
    }
}
