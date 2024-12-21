<?php

namespace App\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ListRequest
{
    public int $page;
    public int $per_page;

    private function __construct(int $page, int $per_page)
    {
        $this->page = $page;
        $this->per_page = $per_page;
    }

    public static function fromArray(array $data): self
    {
        $validator = Validator::make($data, [
            'page' => 'required|integer',
            'per_page' => 'required|integer',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return new Self($data['page'], $data['per_page']);
    }
}
