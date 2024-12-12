<?php

namespace App\Core\Interfaces;

use App\Core\Entities\HasilSurvey;

interface IHasilSurveyRepository
{
    public function findById(int $id): ?HasilSurvey;
    public function save(HasilSurvey $hasil): int;
}
