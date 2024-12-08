<?php

namespace App\Http\Controllers;

use App\Http\Request\TambahSurveyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsesmenController extends Controller
{
    function add_master_bantuan(Request $request)
    {
        // untuk menambah jenis master bantuan
    }

    function add_master_kategori() {}

    function add_master_asesmen() {}

    function add_kpm() {}

    function tambahSurvey(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'data' => 'required|json',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'data' => $validator->errors()]);
            }
            return response()->json(['status' => true, 'data' => json_decode($request->data)]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
