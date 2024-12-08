<?php

namespace App\Core\Entities;

use Illuminate\Support\Facades\Date;

class Kpm
{
    public int $id;
    public string $nik;
    public string $nama;
    public string $alamat;
    public bool $status;
    public int $updated_by;
    public Date $created_at;
    public Date $updated_at;

    public function __construct(int $id, string $nik, string $nama, string $alamat, bool $status, int $updated_by, string $created_at, string $updated_at)
    {
        $this->id = $id;
        $this->nik = $nik;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->status = $status;
        $this->updated_by = $updated_by;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
