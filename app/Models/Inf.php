<?php
namespace App\Models;

class Inf implements FooBarQix
{
    const MULTIPLE_OF = 8;
    const NAME = 'Inf';

    public function multipleOf(): int
    {
        return self::MULTIPLE_OF;
    }

    public function name(): string
    {
        return self::NAME;
    }
}