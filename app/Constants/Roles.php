<?php

namespace App\Constants;

class Roles {

    const ADMINISTRATOR 					    = 'administrator';
    const KEMENTERIAN_PERHUBUNGAN               = 'kementerian_perhubungan';
    const BPTD                                  = 'bptd';
    const DINAS_PERHUBUNGAN_PROVINSI            = 'dinas_perhubungan_provinsi';
    const DINAS_PERHUBUNGAN_KOTA                = 'dinas_perhubungan_kota';
    const DINAS_PERHUBUNGAN_KABUPATEN           = 'dinas_perhubungan_kabupaten';

    private static $data = array(
        'administrator'                         => 'Administrator',
        'kementerian_perhubungan'               => 'Kementerian Perhubungan',
        'bptd'                                  => 'BPTD',
        'dinas_perhubungan_provinsi'            => 'Dinas Perhubungan Provinsi',
        'dinas_perhubungan_kota'                => 'Dinas Perhubungan Kota',
        'dinas_perhubungan_kabupaten'           => 'Dinas Perhubungan Kabupaten'
    );

    public static function getAllRole() {
        return self::$data;
    }

    public static function getNameForCode($code)
    {
        return self::$data[$code];
    }

}
