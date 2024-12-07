<?php

namespace App\Infrastructure\repositories;

use App\Core\Entities\User;
use App\Core\Interfaces\IUserRepository;
use App\Infrastructure\Models\User as ModelsUser;
use Exception;

class UserRepository implements IUserRepository
{
    public function findById(int $id): ?User
    {
        try {
            $result = ModelsUser::where('id', $id)->first();
            if ($result == null) {
                return null;
            }
            return new User(
                $result->id,
                $result->name,
                $result->email,
                $result->password
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function findByEmail(string $email): ?User
    {
        try {
            $result = ModelsUser::where('email', $email)->first();
            if ($result == null) {
                return null;
            }
            return new User(
                $result->id,
                $result->name,
                $result->email,
                $result->password
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function save(User $user): bool
    {
        try {
            $result = ModelsUser::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password
            ]);
            return $result != null;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function createToken(User $user): string
    {
        try {
            $user = ModelsUser::where('email', $user->email)->first();
            if ($user == null) {
                throw new Exception("akun tidak ditemukan");
            }
            $token = $user->createToken('auth_token')->plainTextToken;
            return $token;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
