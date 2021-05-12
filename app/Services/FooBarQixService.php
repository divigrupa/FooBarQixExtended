<?php

declare(strict_types=1);

namespace FooBar\Services;

use InvalidArgumentException;

class FooBarQixService
{
    private const RULE_MULTIPLES = 1;
    private const RULE_OCCURRENCES = 2;

    private array $map = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix',
    ];

    public function get(int $number): string
    {
        return $this->getWithRules($number, self::RULE_MULTIPLES | self::RULE_OCCURRENCES);
    }

    private function getWithRules(int $number, int $rules): string
    {
        if ($number < 0) {
            throw new InvalidArgumentException("Expected positive integer");
        }

        $result = '';

        if ($rules & self::RULE_MULTIPLES) {
            $result .= $this->_getMultiples($number);
        }
        if ($rules & self::RULE_OCCURRENCES) {
            $result .= $this->_getOccurrences($number);
        }

        if ($result === '') {
            return (string)$number;
        }

        return $result;
    }

    public function _getMultiples(int $number): string
    {
        $result = '';

        foreach ($this->map as $key => $value) {
            if ($number % $key === 0) {
                $result .= $value;
            }
        }

        return $result;
    }

    public function _getOccurrences(int $number): string
    {
        $result = '';

        foreach (str_split((string)$number) as $digit) {
            foreach ($this->map as $key => $value) {
                if ($digit === (string)$key) {
                    $result .= $value;
                }
            }
        }

        return $result;
    }

    public function getMultiples(int $number): string
    {
        return $this->getWithRules($number, self::RULE_MULTIPLES);
    }

    public function getOccurrences(int $number): string
    {
        return $this->getWithRules($number, self::RULE_OCCURRENCES);
    }
}
