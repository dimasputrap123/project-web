<?php

namespace App\Core\Entities;

class Survey
{
    public int $id_survey;
    public int $id_kpm;
    public int $id_asesmen;
    public string $text_jawaban;

    function __construct(int $id_survey, int $id_kpm, int $id_asesmen, string $text_jawaban)
    {
        $this->id_survey = $id_survey;
        $this->id_kpm = $id_kpm;
        $this->id_asesmen = $id_asesmen;
        $this->text_jawaban = $text_jawaban;
    }
}
