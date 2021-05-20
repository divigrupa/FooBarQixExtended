<?php

namespace App\Models;

class FooBarQixCollection
{
    private array $multiples;

    public function addMultiples(FooBarQix $multiple): void
    {
        $this->multiples[] = $multiple;
    }

    public function multiples(): array
    {
        return $this->multiples;
    }
}