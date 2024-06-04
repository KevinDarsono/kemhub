<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// model
// use App\Models\Cities as TblCities;
use App\Models\Master\Kota;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first = Kota::first();
        if(!$first) {
            $file = file_get_contents(base_path('/database/seeders/cities.json'));
            $json_data = json_decode($file,true);
            foreach($json_data as $valData) {
                Kota::create($valData);
            }
        }
    }
}
