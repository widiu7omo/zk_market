<?php

/**
 * Laravel Schematics
 *
 * WARNING: removing @tag value will disable automated removal
 *
 * @package Laravel-schematics
 * @url     https://github.com/mtolhuys/laravel-schematics
 * @author  Maarten Tolhuijs <mtolhuys@protonmail.com>
 * @tag     laravel-schematics-pesanans-relation
 * @tag     laravel-schematics-alamats-relation
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanansAlamatsRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanans', static function (Blueprint $table) {
            $table->foreign('alamat_id')->references('id')->on('alamats')->onDelete('set null');
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
            $table->dropForeign(['alamat_id']);
        });
    }
}
