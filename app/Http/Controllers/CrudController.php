<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\HttpStatusCodes;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    protected $service;
    protected $viewDirectorry;


    protected function generateMessage($data, $type = null)
    {
        return;
    }


    protected function generateMessageV2($title = "data", $type = null){
        $message = '';
        switch ($type) {
            case 'create':
                $message = $title.' Berhasil Ditambahkan';
                break;

            case 'update':
                $message = $title.' Berhasil Diubah';
                break;

            case 'delete':
                $message = $title.' Berhasil Dihapus';
                break;

            case 'restore':
                $message = $title.' Berhasil Dipulihkan';
                break;

            default:
                $message = ' Berhasil';
                break;
        }

        return ucwords($message);
    }


    public function index(Request $request)
    {
        $meta['orderBy'] = $request->ascending ? 'asc' : 'desc';
        $meta['limit'] = $request->limit <= 30 ? $request->limit : 30;
        $dataTable = $this->service->getDatatable($request, $meta);
        return response()->json([
            'error' => false,
            'message' => 'Successfully',
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $dataTable['data'],
            'pagination' => $dataTable['meta']
        ], HttpStatusCodes::HTTP_OK);
    }

    public function show(Request $request)
    {
        $validator = $this->runValidationShow($request);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $data = $this->service->getDetailByID($request->id);

        return response()->json([
            'error' => false,
            'message' => 'Successfully',
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $data,
        ], HttpStatusCodes::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validator = $this->runValidationCreate($request);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $data = $this->service->store($request);

        return response()->json([
            'error' => false,
            'message' => $this->generateMessage($data, 'create'),
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $data,
        ], HttpStatusCodes::HTTP_OK);
    }

    public function restore(Request $request)
    {
        $validator = $this->runValidationRestore($request);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $data = $this->service->restore($request->id);

        return response()->json([
            'error' => false,
            'message' => $this->generateMessage($data, 'restore'),
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $data,
        ], HttpStatusCodes::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = $this->runValidationUpdate($request);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $data = $this->service->update($request->id, $request);
        return response()->json([
            'error' => false,
            'message' => $this->generateMessage($data, 'update'),
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $data,
        ], HttpStatusCodes::HTTP_OK);
    }

    public function destroy(Request $request)
    {
        $validator =  $this->runValidationDestroy($request);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $obj = $this->service->delete($request->id);

        return response()->json([
            'error' => false,
            'message' => $this->generateMessage($obj, 'delete'),
            'status_code' => HttpStatusCodes::HTTP_OK,
        ], HttpStatusCodes::HTTP_OK);
    }
}
