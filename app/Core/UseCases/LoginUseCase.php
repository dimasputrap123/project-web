<?php

namespace App\Core\UseCases;

use App\Core\Entities\User;
use App\Core\Interfaces\IUserRepository;
use App\Http\Request\LoginRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginUseCase
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(LoginRequest $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            throw new Exception("akun tidak ditemukan");
        }
        $user = new User(0, '', $request->email, $request->password);
        $token = $this->userRepository->createToken($user);
        return $token;
    }
}
