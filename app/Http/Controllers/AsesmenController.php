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
        // untuk menambah jenis master bantuan
    }

    function add_master_kategori() {}

    function add_master_asesmen() {}

    function add_kpm() {}

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
