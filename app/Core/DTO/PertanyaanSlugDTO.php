<?php

namespace App\Core\DTO;

class PertanyaanSlugDTO
{
    /**
     * @var PertanyaanItem[]
     */
    public array $pertanyaan_arr;
    public string $pertanyaan_json;

    /**
     * @var PertanyaanItem[]
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

class PertanyaanItem
{
    public string $pertanyaan_slug;
    public string $jawaban;

    public function __construct(string $slug, string $jawaban)
    {
        $this->pertanyaan_slug = $slug;
        $this->jawaban = $jawaban;
    }
}
