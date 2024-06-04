<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UnitKerja as TblUnitKerja;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first = TblUnitKerja::first();
        if(!$first) {
            $data = array(
                array(
                    'nama'          => "Kementerian Perhubungan",
                    'kode'     => "kementerian_perhubungan",
                    'level'         => 1
                ),
                array(
                    'nama'          => "BPTD",
                    'kode'     => "bptd",
                    'level'         => 2
                ),
                array(
                    'nama'          => "Dishub provinsi",
                    'kode'     => "dishub_provinsi",
                    'level'         => 2
                ),
                array(
                    'nama'          => "Dishub Kota",
                    'kode'     => "dishub_kota",
                    'level'         => 3
                ),
                array(
                    'nama'          => "Dishub Kabupaten",
                    'kode'     => "dishub_kabupaten",
                    'level'         => 3
                )
            );
            foreach($data as $valData) {
                TblUnitKerja::create($valData);
            }
        }
    }
}
