<?php

namespace App\Core\Entities;

use App\Core\ValueObject\Label;

class Survey
{
    public Label $survey;
    public Label $kpm;
    public Label $asesmen;
    public string $text_jawaban;

    function __construct(Label $survey, Label $kpm, Label $asesmen, string $text_jawaban)
    {
        $this->survey = $survey;
        $this->kpm = $kpm;
        $this->asesmen = $asesmen;
        $this->text_jawaban = $text_jawaban;
    }
}
