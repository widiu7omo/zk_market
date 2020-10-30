<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengaturan_default = DB::table('pengaturans')->insert([
            'name' => 'default',
            'nama_bisnis' => 'Zona Kopi',
            'no_wa' => '+6253276876387',
            'tipe_ongkir' => 'static',
            'alamat' => 'Pelaihari',
            'lat' => '098797687',
            'long' => '097987987',
            'google_api' => 'X_8997elkjcvaodfyuasidu687d-9w8987',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
