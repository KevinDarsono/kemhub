<?php

namespace App\Services\DishubProv\Master;

use App\Models\Master\Perusahaan;
use App\Services\Master\PerusahaanService as MasterPerusahaanService;
use App\Traits\UserAssigned;
use Illuminate\Support\Facades\Auth;

class PerusahaanService extends MasterPerusahaanService
{

    use UserAssigned;

    public function getModel(){
        return Perusahaan::with('provinsi', 'kota', 'user');
    }

    public function getDatatable($request, $meta)
    {
        $query = $this->getModel();

        if ($request->search !== null) {
            $query->where(function($query) use ($request) {
                $columns = ['nama', 'nib'];
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

        $query = $query
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

}
