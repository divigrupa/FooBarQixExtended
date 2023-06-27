<?php declare(strict_types=1);

use App\Service\InfQixFooService;
use App\Service\NumberProcessor;
use App\Tests\Unit\AbstractServiceTest;

/**
 * Class InfQixFooServiceTest
 * @package unit
 */
final class InfQixFooServiceTest extends AbstractServiceTest
{
    /**
     * Dictionary of digits and their corresponding words.
     *
     * @var array
     */
    protected const DIGIT_DICTIONARY = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo',
    ];

    /**
     * {@inheritdoc}
     */
    public static function noTransformationProvider(): array
    {
        return [
            'Number: 1'  => [1, '1'],
            'Number: 2'  => [2, '2'],
            'Number: 4'  => [4, '4'],
            'Number: 5'  => [5, '5'],
            'Number: 11' => [11, '11'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function multiplesProvider(): array
    {
        return [
            'Multiple 8'              => [16, self::getExpectedResult(mult: [8])],
            'Multiple 7'              => [14, self::getExpectedResult(mult: [7])],
            'Multiple 3'              => [9, self::getExpectedResult(mult: [3])],
            'Multiples 8 & 7'         => [56, self::getExpectedResult(mult: [8, 7])],
            'Multiples 8 & 3'         => [24, self::getExpectedResult(mult: [8, 3])],
            'Multiples 8 & 7 | Sum 8' => [1456, self::getExpectedResult(mult: [8, 7], num: 1456)],
            'Multiples 7 & 3'         => [21, self::getExpectedResult(mult: [7, 3])],
            'Multiples 8 & 7 & 3'     => [1512, self::getExpectedResult(mult: [8, 7, 3])],
        ];
    }

    /**
     * Modifies expected result to append word if multiple of digit sum is 8.
     *
     * {@inheritdoc}
     *
     * @param array $mult
     * @param array $occur
     * @param int $num
     * @return string
     */
    protected static function getExpectedResult(array $mult = [], array $occur = [], int $num = 0): string
    {
        $result = parent::getExpectedResult($mult, $occur);

        if ($num !== 0) {
            $digitSum = array_sum(str_split((string)$num));

            if ($digitSum % 8 === 0) {
                $result .= self::DIGIT_DICTIONARY[8];
            }
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public static function occurrencesProvider(): array
    {
        return [
            'Contains 8'         => [89, self::getExpectedResult(occur: [8])],
            'Contains 7 | Sum 8' => [17, self::getExpectedResult(occur: [7], num: 17)],
            'Contains 3'         => [13, self::getExpectedResult(occur: [3])],
            'Contains 8 & 3'     => [83, self::getExpectedResult(occur: [8, 3])],
            'Contains 8 & 7'     => [874, self::getExpectedResult(occur: [8, 7])],
            'Contains 7 & 3'     => [73, self::getExpectedResult(occur: [7, 3])],
            'Contains 8 & 7 & 3' => [8731, self::getExpectedResult(occur: [8, 7, 3])],
            'Contains 3 & 8 & 7' => [3874, self::getExpectedResult(occur: [3, 8, 7])],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function multiplesAndOccurrencesProvider(): array
    {
        return [
            'Multiple 8 | Contains 3'                 => [32, self::getExpectedResult(mult: [8], occur: [3])],
            'Multiple 8 & 7 | Contains 7 & 8'         => [728, self::getExpectedResult(mult: [8, 7], occur: [7, 8])],
            'Multiple 8 & 3 | Contains 8 & 8 | Sum 8' => [4488, self::getExpectedResult(mult: [8, 3], occur: [8, 8], num: 4488)],
            'Multiple 8 & 7 & 3 | Contains 3 & 3'     => [336, self::getExpectedResult(mult: [8, 7, 3], occur: [3, 3])],
            'Multiple 8 & 7 & 3 | Contains 3 & 8 '    => [4368, self::getExpectedResult(mult: [8, 7, 3], occur: [3, 8])],
            'Multiple 8 & 7 | Contains 7 & 8 & 7 & 3' => [78736, self::getExpectedResult(mult: [8, 7], occur: [7, 8, 7, 3])],
        ];
    }

    /**
     * Returns the tested service.
     *
     * @return InfQixFooService
     */
    protected static function getTestedService(): InfQixFooService
    {
        $processor = new NumberProcessor(InfQixFooService::getConfig());
        return new InfQixFooService($processor);
    }

    /**
     * {@inheritdoc}
     */
    protected static function getSeparator(): string
    {
        return '; ';
    }

    /**
     * {@inheritdoc}
     */
    protected static function getDigitDictionary(): array
    {
        return self::DIGIT_DICTIONARY;
    }
}
