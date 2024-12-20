<?php

namespace App\Core\DTO;

class ProfileDTO
{
    public int $id;
    public string $email;
    public string $name;

    public function __construct(mixed $user)
    {
        $this->id = $user->id;
        $this->email = $user->email;
        $this->name = $user->name;
    }
}
