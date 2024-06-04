<?php

namespace Database\Seeders;

use App\Models\Master\Kendaraan;
use App\Models\Master\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// model
// use App\Models\Provinces as TblProvinces;
use App\Models\Master\Provinsi;
use App\Models\User;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emails = [
            'dishubprov@mail.com',
            'dishubkota@mail.com',
            'dishubkab@mail.com',
            'dishubprov2@mail.com',
            'dishubkota2@mail.com',
            'dishubkab2@mail.com'
        ];
        $first = Kendaraan::first();
        if(!$first) {
            $file = file_get_contents(base_path('/database/seeders/kendaraan.json'));
            $json_data = json_decode($file,true);
            foreach($json_data as $valData) {
                $randEmail = array_rand($emails);
                $valData['user_id_input'] = User::where('email', $emails[$randEmail])->first()->id;
                unset($valData['nama_perusahaan']);
                Kendaraan::create($valData);
            }
        }
    }
}
