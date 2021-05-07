<?php declare(strict_types=1);

namespace App\Service\IsServices;

class IsInf implements IsInterface
{
    private int $number;

    public function __construct(int $number)
    {

        $this->number = $number;

    }

    public function isMultiple(): ?string
    {
        return $this->number < 0 ? null : ($this->number % 8 === 0 ? 'Inf' : null);
    }

    public function isEqual(): ?string
    {
        return $this->number === 8 ? 'Inf' : null;
    }

}