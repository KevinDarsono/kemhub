<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Constants\Roles as CodeRoles;
//models
use App\Models\User as TblUser;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(env('APP_ENV') != "production") {
            $first = TblUser::first();
            if(!$first) {
                $data = array(
                    array(
                        'code_role'         => CodeRoles::ADMINISTRATOR,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => null,
                        'kota_id'           => null,
                        'kabupaten_id'      => null,
                        'first_name'        => 'administrator',
                        'last_name'         => 'sistem',
                        'email'             => 'admin@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736391',
                        'is_root'           => true,
                        'active'            => true
                    ),
                    array(
                        'code_role'         => CodeRoles::KEMENTERIAN_PERHUBUNGAN,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => null,
                        'kota_id'           => null,
                        'kabupaten_id'      => null,
                        'first_name'        => 'kementerian_perhubungan',
                        'last_name'         => 'sistem',
                        'email'             => 'kemenhub@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736392',
                        'is_root'           => true,
                        'active'            => true
                    ),
                    array(
                        'code_role'         => CodeRoles::BPTD,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => 11,
                        'kota_id'           => 1101,
                        'kabupaten_id'      => null,
                        'first_name'        => 'bptd',
                        'last_name'         => 'sistem',
                        'email'             => 'bptd@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736393',
                        'is_root'           => true,
                        'active'            => true
                    ),
                    array(
                        'code_role'         => CodeRoles::DINAS_PERHUBUNGAN_PROVINSI,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => 11,
                        'kota_id'           => 1101,
                        'kabupaten_id'      => null,
                        'first_name'        => 'dinas_perhubungan_provinsi',
                        'last_name'         => 'sistem',
                        'email'             => 'dishubprov@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736394',
                        'is_root'           => true,
                        'active'            => true
                    ),
                    array(
                        'code_role'         => CodeRoles::DINAS_PERHUBUNGAN_KOTA,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => 11,
                        'kota_id'           => 1101,
                        'kabupaten_id'      => null,
                        'first_name'        => 'dinas_perhubungan_kota',
                        'last_name'         => 'sistem',
                        'email'             => 'dishubkota@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736395',
                        'is_root'           => true,
                        'active'            => true
                    ),
                    array(
                        'code_role'         => CodeRoles::DINAS_PERHUBUNGAN_KABUPATEN,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => 11,
                        'kota_id'           => 1101,
                        'kabupaten_id'      => null,
                        'first_name'        => 'dinas_perhubungan_kabupaten',
                        'last_name'         => 'sistem',
                        'email'             => 'dishubkab@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736396',
                        'is_root'           => true,
                        'active'            => true
                    ),
                    array(
                        'code_role'         => CodeRoles::BPTD,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => 12,
                        'kota_id'           => 1206,
                        'kabupaten_id'      => null,
                        'first_name'        => 'bptd 2',
                        'last_name'         => 'sistem',
                        'email'             => 'bptd2@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736397',
                        'is_root'           => true,
                        'active'            => true
                    ),
                    array(
                        'code_role'         => CodeRoles::DINAS_PERHUBUNGAN_PROVINSI,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => 12,
                        'kota_id'           => 1206,
                        'kabupaten_id'      => null,
                        'first_name'        => 'dinas_perhubungan_provinsi',
                        'last_name'         => 'sistem',
                        'email'             => 'dishubprov2@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736399',
                        'is_root'           => true,
                        'active'            => true
                    ),
                    array(
                        'code_role'         => CodeRoles::DINAS_PERHUBUNGAN_KOTA,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => 12,
                        'kota_id'           => 1206,
                        'kabupaten_id'      => null,
                        'first_name'        => 'dinas_perhubungan_kota',
                        'last_name'         => 'sistem',
                        'email'             => 'dishubkota2@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736398',
                        'is_root'           => true,
                        'active'            => true
                    ),
                    array(
                        'code_role'         => CodeRoles::DINAS_PERHUBUNGAN_KABUPATEN,
                        'unit_kerja_id'     => null,
                        'provinsi_id'       => 12,
                        'kota_id'           => 1206,
                        'kabupaten_id'      => null,
                        'first_name'        => 'dinas_perhubungan_kabupaten',
                        'last_name'         => 'sistem',
                        'email'             => 'dishubkab2@mail.com',
                        'email_verified_at' => null,
                        'password'          => bcrypt('password'),
                        'phone_number'      => '6281243736400',
                        'is_root'           => true,
                        'active'            => true
                    ),
                );

                foreach($data as $valData) {
                    TblUser::create($valData);
                }
            }
        }
    }
}
