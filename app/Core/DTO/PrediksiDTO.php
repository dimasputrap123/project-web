<?php

namespace App\Core\DTO;

use App\Core\ValueObject\Label;

class PrediksiDTO
{
    public Label $rekomendasi_bantuan;
    public Label $kategori;
    public string $deskripsi;

    public function __construct(Label $rekomendasi_bantuan, Label $kategori)
    {
        $this->rekomendasi_bantuan = $rekomendasi_bantuan;
        $this->kategori = $kategori;
        $this->deskripsi = $this->cekDeskripsi($rekomendasi_bantuan->text);
    }

    private function cekDeskripsi(string $rekomendasi_bantuan): string
    {
        if ($rekomendasi_bantuan == 'PKH') {
            return "Program Keluarga Harapan (PKH) merupakan bantuan sosial yang diberikan kepada keluarga miskin untuk meningkatkan kesejahteraan";
        } else if ($rekomendasi_bantuan == 'BLT') {
            return "Bantuan Langsung Tunai (BLT) merupakan bantuan sosial yang diberikan kepada penerima manfaat berupa uang tunai yang disalurkan melalui Bank Himbara";
        } else if ($rekomendasi_bantuan == 'Bantuan Sembako') {
            return "Bantuan Sembako merupakan bantuan sosial yang diberikan kepada penerima manfaat berupa sembako yang disalurkan oleh warung mitra";
        }
        return '';
    }
}
