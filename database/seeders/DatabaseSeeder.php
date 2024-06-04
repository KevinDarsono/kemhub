<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UnitKerjaSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitiesSeeder::class);
        // $this->call(DistrictsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(JenisAngkutanSeeder::class);
        $this->call(JenisLayananSeeder::class);
        $this->call(PerusahaanSeeder::class);
        $this->call(KendaraanSeeder::class);
        $this->call(TrayekSeeder::class);
        $this->call(RuteTrayekSeeder::class);



    }
}
