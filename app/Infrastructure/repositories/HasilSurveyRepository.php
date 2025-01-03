<?php

namespace App\Infrastructure\repositories;

use App\Core\Entities\HasilSurvey;
use App\Core\Interfaces\IHasilSurveyRepository;
use App\Infrastructure\Models\HasilSurvey as ModelsHasilSurvey;

class HasilSurveyRepository implements IHasilSurveyRepository
{

    public function findById(int $id): ?HasilSurvey
    {
        try {
            $result = ModelsHasilSurvey::where('id', $id)->first();
            if ($result == null) {
                return null;
            }
            return new HasilSurvey(
                $result->id,
                $result->kategori_pred,
                $result->kategori_man,
                $result->rekomendasi_pred,
                $result->rekomendasi_man,
                $result->catatan,
                $result->created_at,
                $result->updated_at,
                $result->created_by,
                $result->updated_by
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function save(HasilSurvey $hasil): int
    {
        try {
            $result = ModelsHasilSurvey::create([
                'kategori_pred' => $hasil->kategori_pred,
                'kategori_man' => $hasil->kategori_man,
                'rekomendasi_pred' => $hasil->rekomendasi_pred,
                'rekomendasi_man' => $hasil->rekomendasi_man,
                'catatan' => $hasil->catatan,
                'created_at' => $hasil->created_at,
                'created_by' => $hasil->created_by,
                'updated_at' => $hasil->updated_at,
                'updated_by' => $hasil->updated_by,
            ]);
            return $result->id;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
