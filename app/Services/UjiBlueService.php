<?php

namespace App\Services;

use App\Models\ApprovalFlow;
use App\Models\ApprovalFlowConfig;
use App\Models\UjiBlue;

class UjiBlueService
{

    public function getModel(){
        return UjiBlue::query();
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

    public function ajukanPersetujuan($id){
        $ujiBlue = UjiBlue::find($id);

        $approvalFlowConfig = ApprovalFlowConfig::where('provinsi_id', $ujiBlue->provinsi_id)
        ->orderBy('tier', 'asc')
        ->get();

        foreach ($approvalFlowConfig as $key => $value) {
            $approvalFlow = new ApprovalFlow();
            $approvalFlow->ref_id = $id;
            $approvalFlow->ref_code_data = "UJI_BLUE";
            $approvalFlow->user_id = $value->approver_user_id;
            $approvalFlow->tier = $value->tier;
            $approvalFlow->save();
        }

        return $approvalFlowConfig;
    }

    public function alurPersetujuan($idBlue)
    {
        $ujiBlue = UjiBlue::find($idBlue);

        $status = ApprovalFlowConfig::where('provinsi_id', $ujiBlue->provinsi_id)
        ->with('approver')
        ->orderBy('tier', 'asc')
        ->get();

        foreach ($status as $key => $value) {
            $status[$key]['histories'] = ApprovalFlow::where('ref_id', $idBlue)
            ->where('user_id', $value->approver_user_id)
            ->get();
        }

        return $status;
    }


}
