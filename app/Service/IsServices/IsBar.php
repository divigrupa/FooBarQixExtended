<?php declare(strict_types=1);

namespace App\Service\IsServices;

class IsBar implements IsInterface
{
    private int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function isMultiple(): ?string
    {
        return $this->number < 0 ? null : ($this->number % 5 === 0 ? 'Bar' : null);
    }

    public function isEqual(): ?string
    {
        return $this->number === 5 ? 'Bar' : null;
    }

}