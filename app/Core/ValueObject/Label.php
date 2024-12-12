<?php

namespace App\Core\ValueObject;

class Label
{
    public int $id;
    public string $text;

    public function __construct(int $id, string $text)
    {
        $this->id = $id;
        $this->text = $text;
    }
}
