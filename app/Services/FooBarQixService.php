<?php

declare(strict_types=1);

namespace FooBar\Services;

use InvalidArgumentException;

class FooBarQixService
{
    private array $map = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix',
    ];

    public function get(int $number): string
    {
        return $this->getMultiples($number);
    }

    public function getMultiples(int $number): string
    {
        if ($number < 0) {
            throw new InvalidArgumentException("Expected positive integer");
        }

        $result = '';

        foreach ($this->map as $key => $value) {
            if ($number % $key === 0) {
                $result .= $value;
            }
        }

        if ($result === '') {
            return (string)$number;
        }

        return $result;
    }

    public function getOccurrences(int $number): string
    {
        return '';
    }
}
