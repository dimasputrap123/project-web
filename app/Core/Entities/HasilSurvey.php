<?php

namespace App\Core\Entities;

use DateTime;

class HasilSurvey
{
    public int $id;
    public int $kategori_pred;
    public int $kategori_man;
    public int $rekomendasi_pred;
    public int $rekomendasi_man;
    public string $catatan;
    public DateTime $created_at;
    public DateTime $updated_at;
    public int $created_by;
    public int $updated_by;

    public function __construct(int $id, int $kategori_pred, int $kategori_man, int $rekomendasi_pred, int $rekomendasi_man, string $catatan, string $created_at, string $updated_at)
    {
        $this->id = $id;
        $this->kategori_pred = $kategori_pred;
        $this->kategori_man = $kategori_man;
        $this->rekomendasi_pred = $rekomendasi_pred;
        $this->rekomendasi_man = $rekomendasi_man;
        $this->catatan = $catatan;
        $this->created_at = date_create($created_at);
        $this->updated_at = date_create($updated_at);
    }
}
