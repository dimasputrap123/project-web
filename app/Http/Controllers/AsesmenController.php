<?php

namespace App\Http\Controllers;

use App\Core\UseCases\TambahSurveyUseCase;
use App\Http\Request\TambahSurveyRequest;
use Illuminate\Http\Request;

class AsesmenController extends Controller
{
    private TambahSurveyUseCase $tambahSurveyUseCase;

    public function __construct(TambahSurveyUseCase $tambahSurveyUseCase)
    {
        $this->tambahSurveyUseCase = $tambahSurveyUseCase;
    }

    function add_master_bantuan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:30',
            'bantuan' => 'required|string|max:255|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $master_bantuan = MasterBantuan::create([
            'id' => $request->id,
            'bantuan' => $request->bantuan,
        ]);

    }

    function add_master_kategori(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:30',
            'kategori' => 'required|string|max:255|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $master_kategori = MasterKategori::create([
            'id' => $request->id,
            'kategori' => $request->kategori,
        ]);

    }

    function add_master_asesmen(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:30',
            'pertanyaan' => 'required|string|max:255',
            'status' => 'required|string|max:30|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $master_asesmen = MasterAsesmen::create([
            'id' => $request->id,
            'pertanyaan' => $request->pertanyaan,
            'status' => $request->status,
        ]);

    }

    function add_kpm(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:30',
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255|',
            'alamat' => 'required|string|max:255|',
            'status' => 'required|string|max:30|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $kpm = Kpm::create([
            'id' => $request->id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

    }

    function tambahSurvey(Request $request)
    {
        try {
            $tambahsurvey_request = TambahSurveyRequest::fromArray($request->all());
            $user = $request->user();
            $this->tambahSurveyUseCase->execute($tambahsurvey_request, $user->id);
            return response()->json(['status' => true, 'data' => json_decode($tambahsurvey_request->surveys)]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }
}
