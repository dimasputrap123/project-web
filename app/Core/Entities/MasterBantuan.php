<?php

namespace App\Core\Entities;

use Illuminate\Support\Facades\Date;

class MasterBantuan
{
    public int $id;
    public string $bantuan;
    public Date $created_at;
    public Date $updated_at;

    public function __construct(int $id, string $bantuan, string $created_at, string $updated_at)
    {
        $this->id = $id;
        $this->bantuan = $bantuan;
        $this->created_at = new Date($created_at);
        $this->updated_at = new Date($updated_at);
    }
}
