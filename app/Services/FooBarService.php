<?php

declare(strict_types=1);

namespace FooBar\Services;

use InvalidArgumentException;

class FooBarService
{
    private array $map = [
        3 => 'Foo',
        5 => 'Bar',
    ];

    public function get(int $number): string
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
}
