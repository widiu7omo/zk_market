<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusBayarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_bayars')->insert([
            ['status_bayar'=>'belum bayar'],
            ['status_bayar'=>'sudah bayar'],
            ['status_bayar'=>'kedaluwarsa'],
            ['status_bayar'=>'gagal bayar'],
        ]);
    }
}
