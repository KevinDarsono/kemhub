<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Districts as TblDistricts;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first = TblDistricts::first();
        if(!$first) {
            $file = file_get_contents(base_path('/database/seeders/districts.json'));
            $json_data = json_decode($file,true);
            foreach($json_data as $valData) {
                TblDistricts::create($valData);
            }
        }
    }
}
