<?php

namespace App\Core\Interfaces;

use App\Core\DTO\KpmAsesmenDTO;
use App\Http\Request\ListRequest;

interface IDaftarKpmQuery
{
    /**
     * @return KpmAsesmenDTO[]
     */
    public function getBelumAsesmen(ListRequest $request): array;
    /**
     * @return KpmAsesmenDTO[]
     */
    public function getSudahAsesmen(ListRequest $request): array;
    /**
     * @return KpmAsesmenDTO[]
     */
    public function getTidakDitemukan(ListRequest $request): array;
    /**
     * @return KpmAsesmenDTO[]
     */
    public function getMeninggal(ListRequest $request): array;
}
