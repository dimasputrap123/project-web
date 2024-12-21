<?php

namespace App\Infrastructure\queries;

use App\Core\DTO\KpmAsesmenDTO;
use App\Core\Interfaces\IDaftarKpmQuery;
use App\Http\Request\ListRequest;
use Illuminate\Support\Facades\DB;

class DaftarKpmQuery implements IDaftarKpmQuery
{
    public function getBelumAsesmen(ListRequest $request): array
    {
        $result = DB::select('select * from kpms where status = ? limit ? offset ?', [0, $request->per_page, $request->page * $request->per_page]);
        $kpm_arr = [];
        foreach ($result as $item) {
            $kpm_arr[] = new KpmAsesmenDTO($item->id, $item->nik, $item->nama, $item->alamat, $item->status);
        }
        return $kpm_arr;
    }

    public function getSudahAsesmen(ListRequest $request): array
    {
        $result = DB::select('select * from kpms where status = ? limit ? offset ?', [1, $request->per_page, $request->page * $request->per_page]);
        $kpm_arr = [];
        foreach ($result as $item) {
            $kpm_arr[] = new KpmAsesmenDTO($item->id, $item->nik, $item->nama, $item->alamat, $item->status);
        }
        return $kpm_arr;
    }

    public function getTidakDitemukan(ListRequest $request): array
    {
        $result = DB::select('select * from kpms where status = ? limit ? offset ?', [2, $request->per_page, $request->page * $request->per_page]);
        $kpm_arr = [];
        foreach ($result as $item) {
            $kpm_arr[] = new KpmAsesmenDTO($item->id, $item->nik, $item->nama, $item->alamat, $item->status);
        }
        return $kpm_arr;
    }

    public function getMeninggal(ListRequest $request): array
    {
        $result = DB::select('select * from kpms where status = ? limit ? offset ?', [3, $request->per_page, $request->page * $request->per_page]);
        $kpm_arr = [];
        foreach ($result as $item) {
            $kpm_arr[] = new KpmAsesmenDTO($item->id, $item->nik, $item->nama, $item->alamat, $item->status);
        }
        return $kpm_arr;
    }
}
