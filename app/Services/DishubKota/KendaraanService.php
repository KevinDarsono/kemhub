<?php

namespace App\Services\DishubKota;

use App\Models\Master\Kendaraan;

class KendaraanService
{

    public function getModel(){
        return new Kendaraan();
    }
    public function getDatatable($request, $meta)
    {
        $userID = \Auth::user()->id;
        $query = $this->getModel()->query();

        if ($request->search !== null) {
            $query->where(function($query) use ($request) {
                $columns = ['nomor_kendaraan', 'nomor_mesin', 'nomor_rangka'];
                foreach ($columns as $key => $column) {
                    $query->orWhereRaw("LOWER(".$column.") LIKE ?", "%".trim(strtolower($request->search))."%");
                }
            });
        }

        $query = $query->where('user_id_input', $userID)
                ->orderBy('created_at', $meta['orderBy']);

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
        $userID = \Auth::user()->id;

        $data->nomor_kendaraan = $request->nomor_kendaraan ?? $data->nomor_kendaraan;
        $data->seat = $request->seat ?? $data->seat;
        $data->merek = $request->merek ?? $data->merek;
        $data->nomor_rangka = $request->nomor_rangka ?? $data->nomor_rangka;
        $data->nomor_mesin = $request->nomor_mesin ?? $data->nomor_mesin;
        $data->user_id_input = $userID;
        return $data;
    }
}
