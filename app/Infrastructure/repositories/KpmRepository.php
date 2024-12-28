<?php

namespace App\Infrastructure\repositories;

use App\Core\Interfaces\IKpmRepository;
use App\Infrastructure\Models\Kpm;

class KpmRepository implements IKpmRepository
{
    public function updateStatusById(int $id, int $status, int $user_id, string $now): bool
    {
        try {
            $result = Kpm::where('id', $id)
                ->update([
                    'status' => $status,
                    'updated_by' => $user_id,
                    'updated_at' => $now
                ]);
            return $result == 1;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
