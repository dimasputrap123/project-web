<?php

namespace App\Core\Interfaces;

use App\Core\DTO\PertanyaanSlugDTO;
use App\Core\DTO\PrediksiDTO;
use App\Http\Request\PrediksiRequest;

interface IHasilPrediksiQuery
{
    public function prediksi(string $pertanyaan_json): PrediksiDTO;
    public function getPertanyaanSlug(PrediksiRequest $request): PertanyaanSlugDTO;
}
