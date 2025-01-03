<?php

namespace App\Core\DTO;

use App\Core\ValueObject\Label;

class PrediksiDTO
{
    public Label $rekomendasi_bantuan;
    public Label $kategori;

    public function __construct(Label $rekomendasi_bantuan, Label $kategori)
    {
        $this->rekomendasi_bantuan = $rekomendasi_bantuan;
        $this->kategori = $kategori;
    }
}
