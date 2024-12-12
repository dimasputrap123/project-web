<?php

namespace App\Core\DTO;

class PrediksiDTO
{
    public string $rekomendasi_bantuan;
    public string $kategori;

    public function __construct(string $rekomendasi_bantuan, string $kategori)
    {
        $this->rekomendasi_bantuan = $rekomendasi_bantuan;
        $this->kategori = $kategori;
    }
}
