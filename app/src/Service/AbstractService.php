<?php declare(strict_types=1);

namespace App\Service;

use InvalidArgumentException;

/**
 * Class AbstractService
 * @package App\Service
 */
abstract class AbstractService
{
    /**
     * Stores the service response.
     *
     * @var string
     */
    protected string $response;

    /**
     * Stores the separator between words in multipliers.
     *
     * @var string
     */
    protected string $separator;

    /**
     * Stores the dictionary with digits and their corresponding words.
     *
     * @var array
     */
    protected array $digitDictionary;

    /**
     * AbstractService constructor.
     */
    public function __construct()
    {
        $this->response = '';
    }

    /**
     * Processes a number and returns a string.
     *
     * @param int $number
     * @return string
     */
    public function processNumber(int $number): string
    {
        if ($number <= 0) {
            throw new InvalidArgumentException('Number must be a positive integer.');
        }

        $this->processMultiples($number);
        $this->processOccurrences($number);

        return strlen($this->response) ? $this->response : (string)$number;
    }

    /**
     * Processes multiples of a number to generate corresponding string.
     *
     * @param int $number
     */
    protected function processMultiples(int $number): void
    {
        $words = [];

        foreach ($this->digitDictionary as $multiple => $word) {
            if ($this->isMultipleOf($number, $multiple)) {
                $words[] = $word;
            }
        }

        $this->response .= implode($this->separator, $words);
    }

    /**
     * Checks if a number is a multiple of another number.
     *
     * @param int $number
     * @param int $multiple
     * @return bool
     */
    protected function isMultipleOf(int $number, int $multiple): bool
    {
        return $number % $multiple === 0;
    }

    /**
     * Appends words corresponding to individual digits in the number to the result string.
     *
     * @param int $number
     */
    protected function processOccurrences(int $number): void
    {
        $digitArray = str_split((string)$number);

        foreach ($digitArray as $digit) {
            $digit = (int)$digit;

            if (isset($this->digitDictionary[$digit])) {
                $this->response .= $this->digitDictionary[$digit];
            }
        }
    }
}
