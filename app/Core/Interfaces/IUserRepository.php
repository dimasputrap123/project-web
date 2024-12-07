<?php

namespace App\Core\Interfaces;

use App\Core\Entities\User;

interface IUserRepository
{
    public function findById(int $id): ?User;
    public function findByEmail(string $email): ?User;
    public function createToken(User $user): string;
    public function save(User $user): bool;
}
