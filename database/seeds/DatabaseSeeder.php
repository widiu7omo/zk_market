<?php

use App\Models\StatusBayar;
use App\Models\StatusPesanan;
use Database\Seeders\PengaturanSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PengaturanSeeder::class,
            StatusBayarSeeder::class,
            StatusPesananSeeder::class]);
    }
}
