<?php

namespace App\Core\Interfaces;

use App\Core\DTO\RekapDashboardDTO;

interface IDashboardQuery
{
    public function getRekapDashboard(): RekapDashboardDTO;
}
