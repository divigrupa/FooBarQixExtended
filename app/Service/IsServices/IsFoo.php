<?php declare(strict_types=1);

namespace App\Service\IsServices;


class IsFoo implements IsInterface
{
    private int $number;

    public function __construct(int $number)
    {

        $this->number = $number;

    }

    public function isMultiple(): ?string
    {
        return $this->number < 0 ? null : ($this->number % 3 === 0 ? 'Foo' : null);
    }

    public function isEqual(): ?string
    {
        return $this->number === 3 ? 'Foo' : null;
    }

}