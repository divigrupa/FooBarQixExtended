<?php declare(strict_types=1);

namespace App\Model;

class Num
{

    private int $number = 0;

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getNumber(): int
    {
        return $this->number;
    }
}