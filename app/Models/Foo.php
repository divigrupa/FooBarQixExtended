<?php

namespace App\Models;

class Foo implements FooBarQix
{
    const MULTIPLE_OF = 3;
    const NAME = 'Foo';

    public function multipleOf(): int
    {
        return self::MULTIPLE_OF;
    }

    public function name(): string
    {
        return self::NAME;
    }
}