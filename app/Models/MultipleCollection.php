<?php

namespace App\Models;

class MultipleCollection
{
    private array $multiples;

    public function addMultiples(Multiple $multiple): void
    {
        $this->multiples[] = $multiple;
    }

    public function multiples(): array
    {
        return $this->multiples;
    }
}