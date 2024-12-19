<?php

namespace App\Core\DTO;

class PertanyaanItemDTO
{
    public string $pertanyaan_slug;
    public string $jawaban;

    public function __construct(string $slug, string $jawaban)
    {
        $this->pertanyaan_slug = $slug;
        $this->jawaban = $jawaban;
    }
}