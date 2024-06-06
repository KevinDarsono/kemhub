<?php

namespace App\Services;

use App\Models\ApprovalFlowConfig;
use App\Models\User;

class ApprovalFlowConfigService
{

    public function getModel(){
        return ApprovalFlowConfig::with('provinsi', 'approver');
    }

    public function getDatatable($request, $meta)
    {
        $query = $this->getModel();

        if ($request->search !== null) {
            $query->where(function($query) use ($request) {
                $columns = ['user_id', 'approver_user_id'];
                foreach ($columns as $key => $column) {
                    $query->orWhereRaw("LOWER(".$column.") LIKE ?", "%".trim(strtolower($request->search))."%");
                }
            });
        }

        if($request->user_id !== null){
            $query = $query->where('user_id', $request->user_id);
        }

        if($request->approver_user_id !== null){
            $query = $query->where('approver_user_id', $request->approver_user_id);
        }

        if($request->provinsi_id !== null){
            $query = $query->where('provinsi_id', $request->provinsi_id);
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

    public function getDetailByProvinceID($id)
    {
        return $this->getModel()->where('provinsi_id', $id)->get();
    }

    public function store($request)
    {
        $data = $this->setContent($request);
        return $data;
    }

    public function update($request)
    {
        $update = $this->setContent($request);
        return $update;
    }

    public function delete($id)
    {
        $this->getModel()->where('provinsi_id', $id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        return true;
    }

    public function setContent($request){
        $this->getModel()->where('provinsi_id', $request->provinsi_id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        foreach ($request->approver_user_id as $key => $value) {
            $data = new ApprovalFlowConfig();
            $data->provinsi_id = $request->provinsi_id;
            $data->approver_user_id = $value;
            $data->tier = $key + 1;
            $data->is_finish = $key == count($request->approver_user_id) - 1 ? true : false;
            $data->save();
        }

        return $data;

    }


}
