<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// model
// use App\Models\Provinces as TblProvinces;
use App\Models\Master\Provinsi;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first = Provinsi::first();
        if(!$first) {
            $file = file_get_contents(base_path('/database/seeders/provinces.json'));
            $json_data = json_decode($file,true);
            foreach($json_data as $valData) {
                Provinsi::create($valData);
            }
        }
    }
}
