<?php declare(strict_types=1);

namespace App\Service;

/**
 * Class InfQixFooService
 * @package App\Service
 */
final class InfQixFooService extends AbstractService
{
    /**
     * Dictionary of multiples and their corresponding words.
     *
     * @var array
     */
    private const DIGIT_DICTIONARY = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo',
    ];

    /**
     * InfQixFooService constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->separator = '; ';
        $this->digitDictionary = self::DIGIT_DICTIONARY;
    }

    /**
     * {@inheritdoc}
     */
    public function processNumber(int $number): string
    {
        $result = parent::processNumber($number);
        $digitSum = $this->getDigitSum($number);

        // If digit sum is a multiple of 8, append 'Inf' to the result.
        if ($this->isMultipleOf($digitSum, 8)) {
            $result .= $this->digitDictionary[8];
        }

        return $result;
    }

    /**
     * Get the sum of the digits of a number.
     *
     * @param int $number
     * @return int
     */
    protected function getDigitSum(int $number): int
    {
        return array_sum(str_split((string)$number));
    }
}
