<?php

namespace App\Services;

use App\Constants\Roles;
use App\Models\User;

class UserManagementService
{

    public function getModel(){
        return User::with('provinsi', 'kota');
    }
    public function getDatatable($request, $meta)
    {
        $query = $this->getModel();

        if ($request->search !== null) {
            $query->where(function($query) use ($request) {
                $columns = ['first_name', 'last_name', 'email'];
                foreach ($columns as $key => $column) {
                    $query->orWhereRaw("LOWER(".$column.") LIKE ?", "%".trim(strtolower($request->search))."%");
                }
            });
        }

        if($request->is_approver){
            $query->where('code_role', Roles::BPTD);
        }

        if($request->role){
            $query->where('code_role', $request->role);
        }

        if($request->provinsi_id){
            $query = $query->where('provinsi_id', $request->provinsi_id);
        }

        if($request->is_dishub){
            $query->whereIn('code_role', [Roles::DINAS_PERHUBUNGAN_PROVINSI, Roles::DINAS_PERHUBUNGAN_KOTA, Roles::DINAS_PERHUBUNGAN_KABUPATEN]);
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
        $data = new User();
        $data = $this->setContent($data, $request);
        $data->save();
        return $data;
    }

    public function update($id, $request)
    {
        $update = $this->getDetailByID($id);
        $update = $this->setContent($update, $request);
        $update->update();
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
        $data->code_role = $request->code_role ?? $data->code_role;
        $data->unit_kerja_id = $request->unit_kerja_id ?? $data->unit_kerja_id;
        $data->provinsi_id = $request->provinsi_id ?? $data->provinsi_id;
        $data->kota_id = $request->kota_id ?? $data->kota_id;
        $data->kabupaten_id = $request->kabupaten_id ?? $data->kabupaten_id;
        $data->first_name = $request->first_name ?? $data->first_name;
        $data->last_name = $request->last_name ?? $data->last_name;
        $data->email = $request->email ?? $data->email;
        $data->password = bcrypt($request->password) ?? $data->password;
        return $data;
    }
}
