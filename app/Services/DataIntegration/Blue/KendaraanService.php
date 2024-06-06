<?php

namespace App\Services\DataIntegration\Blue;

class KendaraanService
{

    public function list($request, $meta){
        $curl = curl_init();
        $page = $request->page;
        $rfid = $request->rfid;
        $vcode = $request->vcode;
        $no_registrasi_kendaraan = $request->no_registrasi_kendaraan;
        $no_rangka = $request->no_rangka;
        $no_mesin = $request->no_mesin;
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('BASE_URL_DATA_INTEGRATION').'/data-integration-service/blue/kendaraan/list?page='.$page.'&rfid='.$rfid.'&vcode='.$vcode.'&no_registrasi_kendaraan='.$no_registrasi_kendaraan.'&no_rangka='.$no_rangka.'&no_mesin='.$no_mesin,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.trim($request->token_data_integration),
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response, true);
        return $response;
    }

    public function find($request){
        $curl = curl_init();
        $no_registrasi_kendaraan = $request->no_registrasi_kendaraan;
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('BASE_URL_DATA_INTEGRATION').'/data-integration-service/blue/kendaraan/find?no_registrasi_kendaraan='.$no_registrasi_kendaraan,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.trim($request->token_data_integration),
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response, true);
        return $response;
    }
}
