<?php

namespace App\Services;

use App\Models\ApprovalFlow;
use App\Models\ApprovalFlowConfig;
use App\Models\KendaraanAngkutan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersetujuanService
{

    public function getModel(){
        return ApprovalFlow::with('kendaraanAngkutan');
    }

    public function getDatatable($request, $meta)
    {
        $query = $this->getModel();

        $query->where('user_id', Auth::user()->id);

        $query = $query->orderBy('created_at', $meta['orderBy']);

        if(isset($request->is_approve)){
            $query = $query->where('is_approve', $request->is_approve);
        }

        if($request->user_input){
            $query = $query->where('user_id', $request->user_id);
        }


        if($request->tgl_pengajuan){
            $query = $query->whereHas('kendaraanAngkutan', function($q) use ($request){
                $q->where('created_at', 'like', '%'.$request->tgl_pengajuan.'%');
            });
        }

        if(isset($request->is_approve_pengajuan)){
            $query = $query->whereHas('kendaraanAngkutan', function($q) use ($request){
                $q->where('is_approve', 'like', '%'.$request->is_approve_pengajuan.'%');
            });
        }

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

    public function approve($request){
        DB::transaction(function () use ($request) {
            $flow = $this->getModel()->where('id', $request->id)->first();
            $flow->is_approve = $request->is_approve;
            $flow->catatan = $request->catatan;
            $flow->is_finish = $request->is_approve;
            $flow->save();

            if($request->is_approve){
                $this->nextFlow($flow);
            }
        });
    }

    public function nextFlow($flow){
        $kendaraanAngkutan = KendaraanAngkutan::where('id', $flow->ref_id)->first();

        $nextFlow = ApprovalFlowConfig::where('user_id', $kendaraanAngkutan->user_id_input)
        ->where('tier', $flow->tier + 1)->first();

        if($nextFlow){
            $newFlow = new ApprovalFlow();
            $newFlow->user_id = $nextFlow->approver_user_id;
            $newFlow->ref_id = $flow->ref_id;
            $newFlow->tier = $nextFlow->tier;
            $newFlow->is_approve = null;
            $newFlow->is_finish = false;
            $newFlow->save();
        } else {
            $kendaraanAngkutan->is_approve = true;
            $kendaraanAngkutan->save();
        }
    }
}
