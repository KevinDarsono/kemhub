<?php

namespace App\Services;

use App\Models\ApprovalFlow;
use App\Models\ApprovalFlowConfig;
use App\Models\KendaraanAngkutan;
use App\Models\KendaraanAngkutanHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KendaraanAngkutanService
{

    public function getModel(){
        return KendaraanAngkutan::with('user',
        'kendaraan',
        'perusahaan',
        'jenisAngkutan', 'jenisLayanan', 'trayek',
        'ruteTrayek'
        );
    }

    public function getDatatable($request, $meta)
    {
        $query = $this->getModel();

        if ($request->search !== null) {
            $query->where(function($query) use ($request) {
                $columns = ['user_id', 'parent_user_id'];
                foreach ($columns as $key => $column) {
                    $query->orWhereRaw("LOWER(".$column.") LIKE ?", "%".trim(strtolower($request->search))."%");
                }
            });
        }

        if($request->user_id !== null){
            $query = $query->where('user_id', $request->user_id);
        }

        if($request->parent_user_id !== null){
            $query = $query->where('parent_user_id', $request->parent_user_id);
        }

        $query = $query->orderBy('created_at', $meta['orderBy']);

        $data = $query->paginate($meta['limit']);
        $meta = [
            'total'        => $data->total(),
            'count'        => $data->count(),
            'per_page'     => $data->perPage(),
            'current_page' => $data->currentPage(),
            'total_pages'  => $data->lastPage()
        ];

        return ['data' => $data->toArray()['data'], 'meta' => $meta];
    }

    public function getDetailByID($id)
    {
        return $this->getModel()->where('id', $id)->first();
    }

    public function store($request)
    {
        DB::transaction(function () use ($request, &$data) {
            $data = new KendaraanAngkutan();
            $data = $this->setContent($data, $request);
            $data->save();

            $this->approvalFlow($data, 1);
        });
        return $data;
    }

    public function update($id, $request)
    {
        DB::transaction(function ()  use ($id, $request, &$update) {
            $update = $this->getDetailByID($id);
            $update = $this->setContent($update, $request);
            $update->update();

            KendaraanAngkutanHistory::create($update->toArray());

            $approvalFlow = ApprovalFlow::where('ref_id', $id)->where('is_approve', false)->first();
            if($approvalFlow){
                $approvalFlow->delete();
                $approvalFlow->save();

                $this->approvalFlow($update, $approvalFlow->tier, $update->user_id);
            }
        });

        return $update;
    }

    public function delete($id)
    {
        $data = $this->getDetailByID($id);
        $data->delete();
        $data->save();
        return $data ?? [];
    }

    public function setContent($data, $request){
        $data->user_id_input = Auth::user()->id;
        $data->perusahaan_id = $request->perusahaan_id ?? $data->perusahaan_id;
        $data->jenis_angkutan_id = $request->jenis_angkutan_id ?? $data->jenis_angkutan_id;
        $data->trayek_id = $request->trayek_id ?? $data->trayek_id;
        $data->provinsi_id = $request->provinsi_id ?? $data->provinsi_id;
        $data->kota_id = $request->kota_id ?? $data->kota_id;
        $data->rute_trayek_id = $request->rute_trayek_id ?? $data->rute_trayek_id;
        $data->jenis_layanan_id = $request->jenis_layanan_id ?? $data->jenis_layanan_id;
        $data->kendaraan_id = $request->kendaraan_id ?? $data->kendaraan_id;
        $data->masa_berlaku_kps = $request->masa_berlaku_kps ?? $data->masa_berlaku_kps;
        $data->masa_berlaku_uji_berkala = $request->masa_berlaku_uji_berkala ?? $data->masa_berlaku_uji_berkala;
        $data->nomor_uji_berkala = $request->nomor_uji_berkala ?? $data->nomor_uji_berkala;
        $data->nomor_srut = $request->nomor_srut ?? $data->nomor_srut;
        $data->nomor_kartu_pengawas_kps = $request->nomor_kartu_pengawas_kps ?? $data->nomor_kartu_pengawas_kps;
        return $data;
    }

    public function approvalFlow($data, $tier, $idUser = null){
        $idUser = $idUser ?? Auth::user()->id;
        $approvalFlowConfig = ApprovalFlowConfig::where('user_id', $idUser)
        ->where('tier', $tier)->first();

        $approvalFlow = new ApprovalFlow();
        $approvalFlow->user_id = $approvalFlowConfig->approver_user_id;
        $approvalFlow->ref_id = $data->id;
        $approvalFlow->tier = $approvalFlowConfig->tier;
        $approvalFlow->is_approve = null;
        $approvalFlow->is_finish = false;
        $approvalFlow->save();
    }

    public function alurPersetujuan($idKendaraanAngkutan)
    {
        $kendaraanAngkutan = KendaraanAngkutan::find($idKendaraanAngkutan);

        $status = ApprovalFlowConfig::where('user_id', $kendaraanAngkutan->user_id_input)
        ->with('approver')
        ->orderBy('tier', 'asc')
        ->get();

        foreach ($status as $key => $value) {
            $status[$key]['histories'] = ApprovalFlow::where('ref_id', $idKendaraanAngkutan)
            ->where('user_id', $value->approver_user_id)
            ->get();
        }

        return $status;
    }


}
