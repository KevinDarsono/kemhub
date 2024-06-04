<?php

namespace App\Services\DishubKota\Master;

use App\Models\Master\Perusahaan;
use App\Traits\UserAssigned;
use Illuminate\Support\Facades\Auth;
use App\Services\Master\PerusahaanService as PerusahaanServiceMaster;

class PerusahaanService extends PerusahaanServiceMaster
{
    use UserAssigned;

    public function getModel(){
        return Perusahaan::with('provinsi', 'kota', 'user');
    }

    public function getDatatable($request, $meta)
    {
        $userId = $this->getUserAssigned();
        $query = $this->getModel();

        if ($request->search !== null) {
            $query->where(function($query) use ($request) {
                $columns = ['nama', 'nib'];
                foreach ($columns as $key => $column) {
                    $query->orWhereRaw("LOWER(".$column.") LIKE ?", "%".trim(strtolower($request->search))."%");
                }
            });
        }

        $query = $query
        ->whereIn('user_id_input', $userId)
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
