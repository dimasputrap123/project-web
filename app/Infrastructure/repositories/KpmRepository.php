<?php

namespace App\Infrastructure\repositories;

use App\Core\Interfaces\IKpmRepository;
use App\Infrastructure\Models\Kpm;

class KpmRepository implements IKpmRepository
{
    public function updateStatusById(int $id, int $status, int $user_id, string $now): bool
    {
        try {
            Kpm::where('id', $id)
                ->update([
                    'status' => $status,
                    'updated_by' => $user_id,
                    'updated_at' => $now
                ]);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
