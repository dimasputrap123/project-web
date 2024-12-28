<?php

namespace App\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateKpmRequest
{
    public int $id;
    public int $status;

    private function __construct(int $id, int $status)
    {
        $this->id = $id;
        $this->status = $status;
    }

    static function fromArray(array $data): self
    {
        $validator = Validator::make($data, [
            'id' => 'required|integer',
            'status' => 'required|integer'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return new Self(
            $data['id'],
            $data['status']
        );
    }
}
