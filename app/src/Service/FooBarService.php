<?php declare(strict_types=1);

namespace App\Service;

use InvalidArgumentException;

/**
 * Class FooBarService
 * @package App\Service
 */
final class FooBarService extends AbstractService
{
    /**
     * Dictionary of multiples and their corresponding words.
     *
     * @var array
     */
    private const DIGIT_DICTIONARY = [
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

        $this->processMultiples($number);
        $this->processOccurrences($number);

        return strlen($this->result) ? $this->result : (string)$number;
    }

    /**
     * Processes multiples of a number to generate corresponding string.
     *
     * @param int $number
     */
    private function processMultiples(int $number): void
    {
        $words = [];

        foreach (self::DIGIT_DICTIONARY as $multiple => $word) {
            if ($this->isMultipleOf($number, $multiple)) {
                $words[] = $word;
            }
        }

        $this->result = implode(', ', $words);
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

    /**
     * Appends words corresponding to individual digits in the number to the result string.
     *
     * @param int $number
     */
    private function processOccurrences(int $number): void
    {
        $digitArray = str_split((string)$number);

        foreach ($digitArray as $digit) {
            $digit = (int)$digit;

            if (isset(self::DIGIT_DICTIONARY[$digit])) {
                $this->result .= self::DIGIT_DICTIONARY[$digit];
            }
        }
    }
}
