<?php

namespace App\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TambahSurveyRequest
{
    public int $id_kpm;
    public int $kategori_pred;
    public int $kategori_man;
    public int $rekomendasi_pred;
    public int $rekomendasi_man;
    public string $surveys;
    public string $catatan;

    private function __construct(int $id_kpm, int $kategori_pred, int $kategori_man, int $rekomendasi_pred, int $rekomendasi_man, string $catatan, string $surveys)
    {
        $this->id_kpm = $id_kpm;
        $this->kategori_pred = $kategori_pred;
        $this->kategori_man = $kategori_man;
        $this->rekomendasi_pred = $rekomendasi_pred;
        $this->rekomendasi_man = $rekomendasi_man;
        $this->catatan = $catatan;
        $this->surveys = $surveys;
    }

    public static function fromArray(array $data): self
    {
        $validator_1 = Validator::make($data, [
            'id_kpm' => 'required|integer',
            'kategori_pred' => 'required|integer',
            'kategori_man' => 'required|integer',
            'rekomendasi_pred' => 'required|integer',
            'rekomendasi_man' => 'required|integer',
            'catatan' => 'required|string|max:255',
            'surveys' => 'required|json',
        ]);

        if ($validator_1->fails()) {
            throw new ValidationException($validator_1);
        }

        $surveys_array = json_decode($data['surveys'], true);

        $data['surveys'] = $surveys_array;

        $validator_2 = Validator::make($data, [
            'surveys' => 'required|array',
            'surveys.*.id_pertanyaan' => 'required',
            'surveys.*.jawaban' => 'required',
        ], [
            'surveys.*.id_pertanyaan' => 'id_pertanyaan field is required.',
            'surveys.*.jawaban' => 'jawaban field is required.'
        ]);

        if ($validator_2->fails()) {
            throw new ValidationException($validator_2);
        }

        return new Self(
            $data['id_kpm'],
            $data['kategori_pred'],
            $data['kategori_man'],
            $data['rekomendasi_pred'],
            $data['rekomendasi_man'],
            $data['catatan'],
            json_encode($data['surveys']),
        );
    }
}
