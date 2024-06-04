<?php

namespace App\Services;

use App\Models\GroupUser;

class UserGroupService
{

    public function getModel(){
        return GroupUser::with('user', 'parentUser');
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
        $data = $this->setContent($request);
        return $data;
    }

    public function update($id, $request)
    {
        $data = $this->setContent($request);
        return $data;
    }

    public function delete($id)
    {
        $data = $this->getDetailByID($id);
        $data->delete();
        $data->save();
        return $data ?? [];
    }

    public function setContent($request){
        $this->getModel()->where('user_id', $request->user_id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
        foreach ($request->parent_user_id as $key => $value) {
            $data = new GroupUser();
            $data->user_id = $request->user_id;
            $data->parent_user_id = $value;
            $data->save();
        }
        return $data;
    }
}
