<?php declare(strict_types=1);

namespace App\Tests\Unit;

use App\Service\FooBarService;
use App\Service\NumberProcessor;

/**
 * Class FooBarServiceTest
 * @package unit
 */
final class FooBarServiceTest extends AbstractServiceTest
{
    /**
     * Dictionary of multiples/occurrences with their corresponding words.
     *
     * @var array
     */
    protected const DIGIT_DICTIONARY = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix',
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
            'Number: 8'  => [8, '8'],
            'Number: 11' => [11, '11'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function multiplesProvider(): array
    {
        return [
            'Multiple 3'          => [6, self::getExpectedResult(mult: [3])],
            'Multiple 5'          => [10, self::getExpectedResult(mult: [5])],
            'Multiple 7'          => [14, self::getExpectedResult(mult: [7])],
            'Multiples 3 & 5'     => [60, self::getExpectedResult(mult: [3, 5])],
            'Multiples 3 & 7'     => [21, self::getExpectedResult(mult: [3, 7])],
            'Multiples 5 & 7'     => [140, self::getExpectedResult(mult: [5, 7])],
            'Multiples 3 & 5 & 7' => [210, self::getExpectedResult(mult: [3, 5, 7])],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function occurrencesProvider(): array
    {
        return [
            'Contains 3'         => [13, self::getExpectedResult(occur: [3])],
            'Contains 5'         => [151, self::getExpectedResult(occur: [5])],
            'Contains 7'         => [17, self::getExpectedResult(occur: [7])],
            'Contains 3 & 5'     => [352, self::getExpectedResult(occur: [3, 5])],
            'Contains 3 & 7'     => [307, self::getExpectedResult(occur: [3, 7])],
            'Contains 5 & 7'     => [5017, self::getExpectedResult(occur: [5, 7])],
            'Contains 3 & 5 & 7' => [3571, self::getExpectedResult(occur: [3, 5, 7])],
            'Contains 7 & 5 & 3' => [7531, self::getExpectedResult(occur: [7, 5, 3])],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function multiplesAndOccurrencesProvider(): array
    {
        return [
            'Multiple 3 | Contains 7'                     => [27, self::getExpectedResult([3], [7])],
            'Multiple 5 & 7 | Contains 3 & 5'             => [35, self::getExpectedResult([5, 7], [3, 5])],
            'Multiple 3 & 5 & 7  | Contains 5'            => [1050, self::getExpectedResult([3, 5, 7], [5])],
            'Multiple 3 & 5 & 7 | Contains 7 & 7 & 7'     => [7770, self::getExpectedResult([3, 5, 7], [7, 7, 7])],
            'Multiple 3 & 5 | Contains 7 & 7 & 5 & 3 & 5' => [77535, self::getExpectedResult([3, 5], [7, 7, 5, 3, 5])],
        ];
    }

    /**
     * Returns the tested service.
     *
     * @return FooBarService
     */
    protected static function getTestedService(): FooBarService
    {
        $processor = new NumberProcessor(FooBarService::getConfig());
        return new FooBarService($processor);
    }

    /**
     * {@inheritdoc}
     */
    protected static function getSeparator(): string
    {
        return ', ';
    }

    /**
     * {@inheritdoc}
     */
    protected static function getDigitDictionary(): array
    {
        return self::DIGIT_DICTIONARY;
    }
}
