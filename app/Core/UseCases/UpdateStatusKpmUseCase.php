<?php

namespace App\Core\UseCases;

use App\Core\Interfaces\IKpmRepository;

class UpdateStatusKpmUseCase
{
    private IKpmRepository $kpmRepository;

    function __construct(IKpmRepository $kpmRepository)
    {
        $this->kpmRepository = $kpmRepository;
    }

    function execute(int $id, int $status, int $user_id)
    {
        $now = date("Y-m-d h:i:s");
        try {
            $result = $this->kpmRepository->updateStatusById($id, $status, $user_id, $now);
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
