<?php

namespace App;

class FooBar
{
    private int $number;
    private const FOO = 3;
    private const BAR = 5;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function run(): string
    {
        if ($this->number % self::BAR == 0 && $this->number % self::FOO == 0) {
            return "Foo, Bar";
        } elseif ($this->number % self::FOO == 0) {
            return "Foo";
        } elseif ($this->number % self::BAR == 0) {
            return "Bar";
        } else {
            return (string) $this->number;
        }
    }
};