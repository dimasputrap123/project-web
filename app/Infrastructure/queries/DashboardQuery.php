<?php

namespace App\Infrastructure\queries;

use App\Core\DTO\RekapDashboardDTO;
use App\Core\Interfaces\IDashboardQuery;
use Exception;
use Illuminate\Support\Facades\DB;

class DashboardQuery implements IDashboardQuery
{
    public function getRekapDashboard(): RekapDashboardDTO
    {
        $result = DB::select('select sum(case when a.status=0 then 1 else 0 end) belum,
                            sum(case when a.status=1 then 1 else 0 end) sudah,
                            sum(case when a.status=2 then 1 else 0 end) tidak_ada,
                            sum(case when a.status=3 then 1 else 0 end) meninggal from kpms a;');
        if (count($result) == 0) {
            throw new Exception("error get data");
        }
        return new RekapDashboardDTO($result[0]->belum, $result[0]->sudah, $result[0]->tidak_ada, $result[0]->meninggal);
    }
}
