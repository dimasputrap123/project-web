<?php

namespace App\Core\UseCases;

use App\Core\Entities\HasilSurvey;
use App\Core\Entities\Survey;
use App\Core\Interfaces\IHasilSurveyRepository;
use App\Core\Interfaces\ISurveyRepository;
use App\Http\Request\TambahSurveyRequest;
use Illuminate\Support\Facades\DB;

class TambahSurveyUseCase
{
    private ISurveyRepository $surveyRepository;
    private IHasilSurveyRepository $hasilSurveyRepository;

    public function __construct(ISurveyRepository $survey, IHasilSurveyRepository $hasil)
    {
        $this->surveyRepository = $survey;
        $this->hasilSurveyRepository = $hasil;
    }

    function execute(TambahSurveyRequest $request, int $id_user)
    {
        $now = date('Y-m-d');
        try {
            DB::beginTransaction();
            $hasil_survey = new HasilSurvey(0, $request->kategori_pred, $request->kategori_man, $request->rekomendasi_pred, $request->rekomendasi_man, $request->catatan, $now, $now);
            $id_hasil = $this->hasilSurveyRepository->save($hasil_survey);
            $surveys = json_decode($request->surveys);
            $survey_array = [];
            foreach ($surveys as $item) {
                array_push($survey_array, new Survey($id_hasil, $request->id_kpm, $item->id_pertanyaan, $item->jawaban));
            }
            $this->surveyRepository->save($survey_array);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    function findMax($a, $b, $c) {
        return max($a, $b, $c);
    }
}
