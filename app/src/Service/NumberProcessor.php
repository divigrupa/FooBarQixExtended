<?php declare(strict_types=1);

namespace App\Service;

use InvalidArgumentException;

/**
 * Class NumberProcessor
 * @package App\Service
 */
class NumberProcessor implements ProcessorInterface
{
    /**
     * Separator between words.
     *
     * @var string
     */
    protected string $separator;

    /**
     * Dictionary of multiples and their corresponding words.
     *
     * @var array
     */
    protected array $digitDictionary;

    /**
     * NumberProcessor constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->digitDictionary = $config['digitDictionary'];
        $this->separator = $config['separator'];
    }

    /**
     * Processes a number and returns a string.
     *
     * @param int $number
     * @return string
     */
    public function process(int $number): string
    {
        if ($number <= 0) {
            throw new InvalidArgumentException('Number must be a positive integer.');
        }

        $response = $this->processMultiples($number);
        $response .= $this->processOccurrences($number);

        return strlen($response) ? $response : (string)$number;
    }

    /**
     * Processes multiples of a number.
     *
     * @param int $number
     * @return string
     */
    protected function processMultiples(int $number): string
    {
        $words = [];

        foreach ($this->digitDictionary as $multiple => $word) {
            if ($this->isMultipleOf($number, $multiple)) {
                $words[] = $word;
            }
        }

        return implode($this->separator, $words);
    }

    /**
     * Checks if a number is a multiple of another number.
     *
     * @param int $number
     * @param int $multiple
     * @return bool
     */
    public function isMultipleOf(int $number, int $multiple): bool
    {
        return $number % $multiple === 0;
    }

    /**
     * Processes occurrences of digits in a number.
     *
     * @param int $number
     * @return string
     */
    protected function processOccurrences(int $number): string
    {
        $result = '';
        $digitArray = str_split((string)$number);

        foreach ($digitArray as $digit) {
            $digit = (int)$digit;

            if (isset($this->digitDictionary[$digit])) {
                $result .= $this->digitDictionary[$digit];
            }
        }

        return $result;
    }
}
