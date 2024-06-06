<?php

namespace App\Http\Controllers\Administrator\API;

use App\Constants\HttpStatusCodes;
use App\Http\Controllers\CrudController;
use App\Models\ApprovalFlowConfig;
use App\Models\KendaraanAngkutan;
use App\Services\KendaraanAngkutanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KendaraanAngkutanController extends CrudController
{
    public function __construct(KendaraanAngkutanService $service){
        $this->service = $service;
    }
    protected function generateMessage($data, $type = null)
    {
        $title = "Kendaraan Angkutan";
        return $this->generateMessagev2($title, $type);
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:kendaraan_angkutan,id,deleted_at,NULL'
        ]);
    }

    public function runValidationCreate($request)
    {
        $approvalFlowConfig = ApprovalFlowConfig::where('user_id', Auth::user()->id)->where('tier', 1)->first();

        if ($approvalFlowConfig) {
            return  Validator::make($request->all(), [
                'perusahaan_id' => 'required|exists:perusahaan,id,deleted_at,NULL',
                'jenis_angkutan_id' => 'required|exists:jenis_angkutan,id,deleted_at,NULL',
                'trayek_id' => 'required|exists:trayek,id,deleted_at,NULL',
                'rute_trayek_id' => 'required|exists:rute_trayek,id,deleted_at,NULL',
                'jenis_layanan_id' => 'required|exists:jenis_layanan,id,deleted_at,NULL',
                'kendaraan_id' => 'required|exists:kendaraan,id,deleted_at,NULL|unique:kendaraan_angkutan,kendaraan_id,NULL,id,deleted_at,NULL',
                // 'provinsi_id' => 'required|exists:provinsi,id,deleted_at,NULL',
                // 'kota_id' => 'required|exists:kota,id,deleted_at,NULL',
                'masa_berlaku_kps' => 'required|date',
                'masa_berlaku_uji_berkala' => 'required|date',
                'nomor_uji_berkala' => 'required|string',
                'nomor_srut' => 'required|string',
                'nomor_kartu_pengawas_kps' => 'required|string',
            ]);
        }

        return Validator::make($request->all(), [
            'perusahaan_id' => [
                function ($attribute, $value, $fail) use($request) {
                    $fail('Anda belom bisa menambahkan data kendaraan angkutan. Silakan hubungi Admin.');
                }
            ]
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => ['required',
                'exists:kendaraan_angkutan,id,deleted_at,NULL',
                function ($attribute, $value, $fail) use($request) {
                    $data = KendaraanAngkutan::find($request->id);
                    if ($data->is_approve !== 0) {
                        $fail('Data tidak bisa diubah.');
                    }
                }
            ],
            'perusahaan_id' => 'required|exists:perusahaan,id,deleted_at,NULL',
            'jenis_angkutan_id' => 'required|exists:jenis_angkutan,id,deleted_at,NULL',
            'trayek_id' => 'required|exists:trayek,id,deleted_at,NULL',
            'rute_trayek_id' => 'required|exists:rute_trayek,id,deleted_at,NULL',
            'jenis_layanan_id' => 'required|exists:jenis_layanan,id,deleted_at,NULL',
            'kendaraan_id' => 'required|exists:kendaraan,id,deleted_at,NULL|unique:kendaraan_angkutan,kendaraan_id,'.$request->id.',id,deleted_at,NULL',
            'masa_berlaku_kps' => 'required|date',
            'masa_berlaku_uji_berkala' => 'required|date',
            'nomor_uji_berkala' => 'required|string',
            'nomor_srut' => 'required|string',
            'nomor_kartu_pengawas_kps' => 'required|string',

        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:kendaraan_angkutan,id,deleted_at,NULL'
        ]);
    }

    public function persetujuan(Request $request){
        $validator = Validator::make($request->all(), [
            'id_kendaraan_angkutan' => 'required|exists:kendaraan_angkutan,id,deleted_at,NULL'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $data = $this->service->alurPersetujuan($request->id_kendaraan_angkutan);

        return response()->json([
            'error' => false,
            'message' => 'Successfully',
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $data,
        ], HttpStatusCodes::HTTP_OK);
    }

}
