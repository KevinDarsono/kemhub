<?php

namespace App\Services\DishubProv\Master;

use App\Models\GroupUser;
use App\Models\Master\Kendaraan;
use App\Models\Master\Perusahaan;
use Illuminate\Support\Facades\Auth;
use App\Services\Master\KendaraanService as KendaraanServiceMaster;
use App\Traits\UserAssigned;

class KendaraanService extends KendaraanServiceMaster
{
    use UserAssigned;

    public function getModel(){
        return Kendaraan::with('user');
    }
    public function getDatatable($request, $meta)
    {
        $userId = $this->getUserAssigned();
        $query = $this->getModel();

        if ($request->search !== null) {
            $query->where(function($query) use ($request) {
                $columns = ['nomor_kendaraan', 'nomor_mesin', 'nomor_rangka'];
                foreach ($columns as $key => $column) {
                    $query->orWhereRaw("LOWER(".$column.") LIKE ?", "%".trim(strtolower($request->search))."%");
                }
            });
        }

        $query = $query->where(function($query) use ($request) {
            $query->orWhereHas('user', function($query) {
                $query->where('provinsi_id', Auth::user()->provinsi_id);
            });
            $query->orWhereIn('user_id_input', $this->getUserAssigned());
        });

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
}
