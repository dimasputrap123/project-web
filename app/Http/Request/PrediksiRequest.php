<?php

namespace App\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PrediksiRequest
{
    public string $surveys;

    private function __construct(string $surveys)
    {
        $this->surveys = $surveys;
    }

    public static function fromArray(array $data): self
    {
        $validator_1 = Validator::make($data, [
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
            json_encode($data['surveys']),
        );
    }
}
