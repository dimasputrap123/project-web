<?php

namespace App\Core\Entities;

use Exception;

class User
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;

    public function __construct(string $id, string $name, string $email, string $password)
    {
        if (strlen($password) < 8) {
            throw new Exception('password min 8 karakter');
        }
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
