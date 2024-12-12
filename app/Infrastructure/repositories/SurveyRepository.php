<?php

namespace App\Infrastructure\repositories;

use App\Core\Entities\Survey;
use App\Core\Interfaces\ISurveyRepository;
use App\Infrastructure\Models\Survey as ModelsSurvey;

class SurveyRepository implements ISurveyRepository
{
    function isExistByIdSurvey(int $id): bool
    {
        try {
            $result = ModelsSurvey::where('id_survey', $id)->first();
            return $result != null;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function findByIdSurvey(int $id): array
    {
        try {
            $result = ModelsSurvey::where('id_survey', $id)->get();
            $result_arr = [];
            foreach ($result as $item) {
                array_push($result_arr, new Survey($item->id_survey, $item->id_kpm, $item->id_asesmen, $item->text_jawaban));
            }
            return $result_arr;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function save(array $surveys)
    {
        try {
            ModelsSurvey::insert($surveys);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
