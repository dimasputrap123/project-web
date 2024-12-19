<?php

namespace App\Core\DTO;

class PertanyaanSlugDTO
{
    /**
     * @var PertanyaanItemDTO[]
     */
    public array $pertanyaan_arr;
    public string $pertanyaan_json;

    /**
     * @var PertanyaanItemDTO[]
     */
    public function __construct(array $pertanyaan_arr)
    {
        $this->pertanyaan_arr = $pertanyaan_arr;
        $this->pertanyaan_json = $this->toJson($pertanyaan_arr);
    }

    private function toJson(array $pertanyaan_arr): string
    {
        $tmp = [];
        foreach ($pertanyaan_arr as $item) {
            $tmp[$item->pertanyaan_slug] = $item->jawaban;
        }
        return json_encode($tmp);
    }
}
