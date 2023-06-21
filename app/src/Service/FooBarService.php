<?php declare(strict_types=1);

namespace App\Service;

use InvalidArgumentException;

/**
 * Class FooBarService
 * @package app\src
 */
final class FooBarService
{
    /**
     * Dictionary of multiples and their corresponding words.
     *
     * @var array
     */
    private const MULTIPLY_DICTIONARY = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix',
    ];

    /**
     * Stores the result of the processNumber method.
     *
     * @var string
     */
    private string $result;

    /**
     * Processes a number and returns a string.
     *
     * @param int $number
     * @return string
     */
    public function processNumber(int $number): string
    {
        $this->result = '';

        if ($number <= 0) {
            throw new InvalidArgumentException('Number must be a positive integer.');
        }

        $this->generateString($number);

        return strlen($this->result) ? $this->result : (string)$number;
    }

    /**
     * Generates a string based on the number provided.
     *
     * @param int $number
     */
    private function generateString(int $number): void
    {
        foreach (self::MULTIPLY_DICTIONARY as $multiple => $word) {
            if ($this->isMultipleOf($number, $multiple)) {
                $this->result .= $word;
            }
        }
    }

    /**
     * Checks if a number is a multiple of another number.
     *
     * @param int $number
     * @param int $multiple
     * @return bool
     */
    private function isMultipleOf(int $number, int $multiple): bool
    {
        return $number % $multiple === 0;
    }
}
