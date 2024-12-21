<?php

namespace App\Core\DTO;

class KpmAsesmenDTO
{
    public int $id;
    public string $nik;
    public string $nama;
    public string $alamat;
    public int $status;

    public function __construct(int $id, string $nik, string $nama, string $alamat, int $status)
    {
        $this->nik = $nik;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->status = $status;
    }
}
