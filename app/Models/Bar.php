<?php

namespace App\Models;

class Bar implements Multiple
{
    const MULTIPLE_OF = 5;
    const NAME = 'Bar';

    public function multipleOf(): int
    {
        return self::MULTIPLE_OF;
    }

    public function name(): string
    {
        return self::NAME;
    }
}