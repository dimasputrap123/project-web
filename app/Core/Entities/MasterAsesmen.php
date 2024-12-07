<?php

namespace App\Core\Entities;

use Illuminate\Support\Facades\Date;

class MasterAsesmen
{
    public int $id;
    public string $pertanyaan;
    public bool $status;
    public Date $created_at;
    public Date $updated_at;

    public function __construct(int $id, string $pertanyaan, bool $status, string $created_at, string $updated_at)
    {
        $this->id = $id;
        $this->pertanyaan = $pertanyaan;
        $this->status = $status;
        $this->created_at = new Date($created_at);
        $this->updated_at = new Date($updated_at);
    }
}
