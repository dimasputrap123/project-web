<?php

namespace App\Core\Interfaces;

use App\Core\Entities\Survey;

interface ISurveyRepository
{
    public function isExistByIdSurvey(int $id): bool;
    /**
     * @return Survey[]
     */
    public function findByIdSurvey(int $id): array;
    /**
     * @var Survey[]
     */
    public function save(array $surveys);
}
