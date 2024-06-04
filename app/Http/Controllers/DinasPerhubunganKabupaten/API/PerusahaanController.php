<?php

namespace App\Http\Controllers\DinasPerhubunganKabupaten\API;

use App\Http\Controllers\CrudController;
use App\Services\DishubKota\PerusahaanService;
use Illuminate\Support\Facades\Validator;

class PerusahaanController extends CrudController
{

    public function __construct(PerusahaanService $service){
        $this->service = $service;
    }

    protected function generateMessage($data, $type = null)
    {
        $title = "Perusahaan";
        return $this->generateMessagev2($title, $type);
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:perusahaan,id,deleted_at,NULL'
        ]);
    }

    public function runValidationCreate($request)
    {
        return  Validator::make($request->all(), [
            'nama' => 'required|string|unique:perusahaan,nama,NULL,id,deleted_at,NULL',
            'nib' => 'required|string|unique:perusahaan,nib,NULL,id,deleted_at,NULL',
            'alamat' => 'required|string',
            'provinsi_id' => 'required|exists:provinsi,id,deleted_at,NULL',
            'kota_id' => 'required|exists:kota,id,deleted_at,NULL',
            'nama_pimpinan' => 'required|string',
            'email' => 'required|string',
            'no_telepon_perusahaan' => 'required|string',
            'no_telepon_penanggung_jawab' => 'required|string',
            'nomor_npwp' => 'required|string',
            'jenig_angkutan_id' => 'required|exists:jenis_angkutan,id,deleted_at,NULL',
            'no_sk_izin_penyelenggaraan' => 'required|string',
            'tanggal_sk_terbit' => 'required|date',
            'tanggal_sk_expired' => 'required|date',
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:perusahaan,id,deleted_at,NULL',
            'nama' => 'required|string|unique:perusahaan,nama,'.$request->id.',id,deleted_at,NULL',
            'nib' => 'required|string|unique:perusahaan,nib,'.$request->id.',id,deleted_at,NULL',
            'alamat' => 'required|string',
            'provinsi_id' => 'required|exists:provinsi,id,deleted_at,NULL',
            'kota_id' => 'required|exists:kota,id,deleted_at,NULL',
            'nama_pimpinan' => 'required|string',
            'email' => 'required|string',
            'no_telepon_perusahaan' => 'required|string',
            'no_telepon_penanggung_jawab' => 'required|string',
            'nomor_npwp' => 'required|string',
            'jenig_angkutan_id' => 'required|exists:jenis_angkutan,id,deleted_at,NULL',
            'no_sk_izin_penyelenggaraan' => 'required|string',
            'tanggal_sk_terbit' => 'required|date',
            'tanggal_sk_expired' => 'required|date',

        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:perusahaan,id,deleted_at,NULL'
        ]);
    }

}
