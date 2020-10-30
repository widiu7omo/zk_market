<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pesanans')->insert([
            ['status_pesanan'=>'pemesanan'],
            ['status_pesanan'=>'pembuatan'],
            ['status_pesanan'=>'pengantaran'],
            ['status_pesanan'=>'sampai'],
            ['status_pesanan'=>'batal'],
        ]);
    }
}
