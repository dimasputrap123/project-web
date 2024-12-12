<?php

namespace App\Core\Interfaces;

use App\Core\DTO\PrediksiDTO;

interface IHasilPrediksiQuery
{
    public function prediksi(): PrediksiDTO;
}
