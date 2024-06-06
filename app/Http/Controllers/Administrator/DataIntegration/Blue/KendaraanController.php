<?php

namespace App\Http\Controllers\Administrator\DataIntegration\Blue;

use App\Constants\HttpStatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CrudController;
use App\Services\DataIntegration\Blue\KendaraanService;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    protected $service;

    public function __construct(KendaraanService $service)
    {
        $this->service = $service;
    }

    public function list(Request $request)
    {
        $meta['orderBy'] = $request->ascending ? 'asc' : 'desc';
        $meta['limit'] = $request->limit <= 30 ? $request->limit : 30;
        $dataTable = $this->service->list($request, $meta);
        if ($dataTable) {
            return response()->json([
                'error' => false,
                'message' => 'Successfully',
                'status_code' => HttpStatusCodes::HTTP_OK,
                'data' => $dataTable['data'],
                'pagination' => $dataTable['meta']
            ], HttpStatusCodes::HTTP_OK);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed',
                'status_code' => HttpStatusCodes::HTTP_INTERNAL_SERVER_ERROR,
            ], HttpStatusCodes::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function find(Request $request)
    {
        $data = $this->service->find($request);
        return response()->json($data, HttpStatusCodes::HTTP_OK);

    }

}
