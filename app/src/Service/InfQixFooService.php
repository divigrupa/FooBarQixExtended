<?php declare(strict_types=1);

namespace App\Service;

/**
 * Class InfQixFooService
 * @package App\Service
 */
final class InfQixFooService implements ServiceInterface
{
    /**
     * Dictionary of multiples and their corresponding words.
     *
     * @var array
     */
    public const DIGIT_DICTIONARY = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo',
    ];

    /**
     * Separator between words.
     */
    public const SEPARATOR = '; ';

    /**
     * Number processor.
     *
     * @var NumberProcessorInterface $processor
     */
    protected NumberProcessorInterface $processor;

    /**
     * InfQixFooService constructor.
     *
     * @param NumberProcessorInterface $processor
     */
    public function __construct(NumberProcessorInterface $processor)
    {
        $this->processor = $processor;
    }

    /**
     * {@inheritdoc}
     */
    public static function getConfig(): array
    {
        return [
            'digitDictionary' => self::DIGIT_DICTIONARY,
            'separator'       => self::SEPARATOR,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function execute(int $number): string
    {
        $result = $this->processor->processNumber($number);
        $digitSum = $this->getDigitSum($number);

        // If digit sum is a multiple of 8, append 'Inf' to the result.
        if ($this->processor->isMultipleOf($digitSum, 8)) {
            $result .= self::DIGIT_DICTIONARY[8];
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
