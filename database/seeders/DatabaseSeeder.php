<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            BagianSeeder::class,
            BarangSeeder::class,
            PegawaiSeeder::class,
            PemesananSeeder::class,
            PengambilanSeeder::class,
            ProduksiSeeder::class
        ]);
    }
}
