<?php

namespace App\Core\Entities;

use Illuminate\Support\Facades\Date;

class MasterKategori
{
    public int $id;
    public string $kategori;
    public Date $created_at;
    public Date $update_at;

    public function __construct(int $id, string $kategori, string $created_at, string $update_at)
    {
        $this->id = $id;
        $this->kategori = $kategori;
        $this->created_at = new Date($created_at);
        $this->update_at = new Date($created_at);
    }
}
