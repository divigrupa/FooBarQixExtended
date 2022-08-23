<?php

namespace App;

use Exception;

class FooBar
{
    private int $number;
    private const FOO = 3;
    private const BAR = 5;
    private const QIX = 7;
    private array $result = [];

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function run(): string
    {
        if ($this->number < 0) {
            throw new Exception("need positive integer");
        }
        if ($this->number % self::FOO == 0) {
            array_push($this->result, "Foo");
        }
        if ($this->number % self::BAR == 0) {
            array_push($this->result, "Bar");
        }
        if ($this->number % self::QIX == 0) {
            array_push($this->result, "Qix");
        }
        if ($this->number % self::FOO !== 0 && $this->number % self::BAR !== 0 && $this->number % self::QIX !== 0) {
            array_push($this->result, $this->number);
        }
        return implode(", ", $this->result);
    }
};