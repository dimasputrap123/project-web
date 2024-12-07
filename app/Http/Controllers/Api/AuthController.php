<?php

namespace App\Http\Controllers\Api;

use App\Core\UseCases\LoginUseCase;
use App\Core\UseCases\RegisterUseCase;
use App\Http\Controllers\Controller;
use App\Http\Request\LoginRequest;
use App\Http\Request\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private RegisterUseCase $registerUseCase;
    private LoginUseCase $loginUseCase;

    public function __construct(RegisterUseCase $registerUseCase, LoginUseCase $loginUseCase)
    {
        $this->registerUseCase = $registerUseCase;
        $this->loginUseCase = $loginUseCase;
    }

    public function register(Request $request): JsonResponse
    {
        try {
            $register_request = RegisterRequest::fromArray($request->all());
            $result = $this->registerUseCase->execute($register_request);
            if (!$result) {
                return response()->json(['status' => false, 'message' => 'user sudah ada']);
            }
            return response()->json(['status' => true, 'message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()], 400);
        }
    }

    public function login(Request $request)
    {
        try {
            $login_request = LoginRequest::fromArray($request->all());
            $token = $this->loginUseCase->execute($login_request);
            return response()->json(['status' => true, 'message' => 'success', 'data' => $token]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()], 400);
        }
    }
}
