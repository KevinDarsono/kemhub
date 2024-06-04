<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function importKendaraanAngkutan(Request $request) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        return response()->json([
            'message' => "$filename File berhasil diupload"
        ]);
    }
}
