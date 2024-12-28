<?php

namespace App\Core\Interfaces;

interface IKpmRepository
{
    public function updateStatusById(int $id, int $status, int $user_id, string $now): bool;
}
