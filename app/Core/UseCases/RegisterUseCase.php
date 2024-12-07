<?php

namespace App\Core\UseCases;

use App\Core\Entities\User;
use App\Core\Interfaces\IUserRepository;

class RegisterUseCase
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(User $user): bool
    {
        $is_exists_byid = $this->userRepository->findById($user->id);
        if ($is_exists_byid != null) {
            return false;
        }

        $is_exists_byemail = $this->userRepository->findByEmail($user->email);
        if ($is_exists_byemail != null) {
            return false;
        }

        $result = $this->userRepository->save($user);
        return $result;
    }
}
