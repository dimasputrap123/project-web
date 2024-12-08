<?php

namespace App\Core\Interfaces;

use App\Core\Entities\Survey;

interface ISurveyRepository
{
    public function findOneOnly(int $id): ?Survey;
    /**
     * @return Survey[]
     */
    public function findByIdSurver(int $id): array;
    public function save(): int;
}
