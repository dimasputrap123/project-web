<?php

namespace App\Core\DTO;

class RekapDashboardDTO
{
    public int $belum_asesmen;
    public int $sudah_asesmen;
    public int $tidak_ditemukan;
    public int $meninggal;

    public function __construct(int $belum_asesmen, int $sudah_asesmen, int $tidak_ditemukan, int $meninggal)
    {
        $this->belum_asesmen = $belum_asesmen;
        $this->sudah_asesmen = $sudah_asesmen;
        $this->tidak_ditemukan = $tidak_ditemukan;
        $this->meninggal = $meninggal;
    }
}
