<?php

namespace App\Core\UseCases;

use App\Core\Entities\HasilSurvey;
use App\Core\Entities\Survey;
use App\Core\Interfaces\IHasilSurveyRepository;
use App\Core\Interfaces\IKpmRepository;
use App\Core\Interfaces\ISurveyRepository;
use App\Http\Request\TambahSurveyRequest;
use Illuminate\Support\Facades\DB;

class TambahSurveyUseCase
{
    private ISurveyRepository $surveyRepository;
    private IHasilSurveyRepository $hasilSurveyRepository;
    private IKpmRepository $kpmRepository;

    public function __construct(ISurveyRepository $survey, IHasilSurveyRepository $hasil, IKpmRepository $kpm)
    {
        $this->surveyRepository = $survey;
        $this->hasilSurveyRepository = $hasil;
        $this->kpmRepository = $kpm;
    }

    function execute(TambahSurveyRequest $request, int $id_user)
    {
        $now = date('Y-m-d');
        try {
            DB::beginTransaction();
            $hasil_survey = new HasilSurvey(
                0,
                $request->kategori_pred,
                $request->kategori_man,
                $request->rekomendasi_pred,
                $request->rekomendasi_man,
                $request->catatan,
                $now,
                $now,
                $id_user,
                $id_user
            );
            $id_hasil = $this->hasilSurveyRepository->save($hasil_survey);
            $surveys = json_decode($request->surveys);
            $survey_array = [];
            foreach ($surveys as $item) {
                array_push($survey_array, new Survey($id_hasil, $request->id_kpm, $item->id_pertanyaan, $item->jawaban));
            }
            $this->surveyRepository->save($survey_array);
            $this->kpmRepository->updateStatusById($request->id_kpm, 1, $id_user, $now);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    function findMax($a, $b, $c)
    {
        return max($a, $b, $c);
    }
}
