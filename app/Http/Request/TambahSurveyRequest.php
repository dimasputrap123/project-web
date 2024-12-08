<?php

namespace App\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TambahSurveyRequest
{
    public int $kategori_pred;
    public int $kategori_man;
    public int $rekomendasi_pred;
    public int $rekomendasi_man;
    /**
     * @var SurveyRequest[]
     */
    public array $surveys;
    public string $catatan;

    private function __construct(int $kategori_pred, int $kategori_man, int $rekomendasi_pred, int $rekomendasi_man, string $catatan, array $surveys)
    {
        $this->kategori_pred = $kategori_pred;
        $this->kategori_man = $kategori_man;
        $this->rekomendasi_pred = $rekomendasi_pred;
        $this->rekomendasi_man = $rekomendasi_man;
        $this->catatan = $catatan;
        $this->surveys = $surveys;
    }

    public static function fromArray(array $data): self
    {
        $validator = Validator::make($data, [
            'kategori_pred' => 'required|number',
            'kategori_man' => 'required|number',
            'rekomendasi_pred' => 'required|number',
            'rekomendasi_man' => 'required|number',
            'catatan' => 'required|string|max:255',
            'surveys' => 'required|json',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            $surveyObject = json_decode($data['surveys'], true);
            $surveyArray = [];
            foreach ($surveyObject as $value) {
                $item = new SurveyRequest($value['id_pertanyaan'], $value['id_jawaban']);
                array_push($surveyArray, $item);
            }

            return new Self(
                $data['kategori_pred'],
                $data['kategori_man'],
                $data['rekomendasi_pred'],
                $data['rekomendasi_man'],
                $data['catatan'],
                $surveyArray,
            );
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }
}

class SurveyRequest
{
    public int $id_pertanyaan;
    public string $jawaban;

    public function __construct(int $id_pertanyaan, string $jawaban)
    {
        $this->id_pertanyaan = $id_pertanyaan;
        $this->jawaban = $jawaban;
    }
}
