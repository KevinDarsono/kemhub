<?php

namespace App\Services\Master;

use App\Models\Master\Kecamatan;

class KecamatanService
{
    public function getModel(){
        return new Kecamatan();
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
}
