<?php

namespace App\Services\Master;

use App\Models\Master\JenisAngkutan;

class JenisAngkutanService
{
    public function getModel(){
        return new JenisAngkutan();
    }
    public function getDatatable($request, $meta)
    {
        $query = $this->getModel()->query();

        if ($request->search !== null) {
            $query->where(function($query) use ($request) {
                $columns = ['nama'];
                foreach ($columns as $key => $column) {
                    $query->orWhereRaw("LOWER(".$column.") LIKE ?", "%".trim(strtolower($request->search))."%");
                }
            });
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
        $data = $this->getModel();
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
        $data->nama = strtoupper(str_replace(' ', '', $request->nama)) ?? $data->nama;
        $data->keterangan = $request->keterangan ?? $data->keterangan;
        return $data;
    }
}
