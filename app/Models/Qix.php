<?php
namespace App\Models;

class Qix implements FooBarQix
{
    const MULTIPLE_OF = 7;
    const NAME = 'Qix';

    public function multipleOf(): int
    {
        return self::MULTIPLE_OF;
    }

    public function name(): string
    {
        return self::NAME;
    }
}