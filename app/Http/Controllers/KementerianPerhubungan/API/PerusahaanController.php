<?php

namespace App\Http\Controllers\KementerianPerhubungan\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants\HttpStatusCodes;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
// models
use App\Models\Master\Perusahaan as TblPerusahaan;

class PerusahaanController extends Controller
{

    public function list(Request $term) {
        $validator = Validator::make($term->all(), [
            'page'      => 'required|numeric',
            'limit'     => 'required|numeric|max:50',
            'ascending' => 'required|boolean',
            'search'    => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }
        $query = TblPerusahaan::query()->with(['provinsi','kota','user']);

        $query->when($term->search != null, function($query) use($term) {
            $query->where('nama', 'like', '%'.$term->search.'%');
        });

        $result = $query->orderBy('created_at','desc')->paginate($term->limit);
        return response()->json([
            'status_code'   => HttpStatusCodes::HTTP_OK,
            'error'         => false,
            'message'       => "Successfully",
            'data'          => $result->toArray()['data'],
            'pagination'    => [
                'total'        => $result->total(),
                'count'        => $result->count(),
                'per_page'     => $result->perPage(),
                'current_page' => $result->currentPage(),
                'total_pages'  => $result->lastPage()
            ]
        ], HttpStatusCodes::HTTP_OK);
    }
    
    // end class
}
