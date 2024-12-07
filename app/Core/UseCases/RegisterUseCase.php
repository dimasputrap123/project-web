<?php

namespace App\Core\UseCases;

use App\Core\Entities\User;
use App\Core\Interfaces\IUserRepository;
use App\Http\Request\RegisterRequest;

class RegisterUseCase
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(RegisterRequest $registerRequest): bool
    {
        $user = new User(0, $registerRequest->name, $registerRequest->email, $registerRequest->password);
        $is_exists_byemail = $this->userRepository->findByEmail($user->email);
        if ($is_exists_byemail != null) {
            return false;
        }

        $result = $this->userRepository->save($user);
        return $result;
    }
}
