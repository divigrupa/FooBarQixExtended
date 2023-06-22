<?php declare(strict_types=1);

use App\Service\InfQixFooService;
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
    public const DIGIT_DICTIONARY = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo',
    ];

    /**
     * Provides input to test the no-transformation cases.
     *
     * @return array
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
     * Provides valid input for the test of only multiples.
     *
     * @return array
     */
    public static function multiplesProvider(): array
    {
        return [
            'Multiple 8'          => [16, self::digitsToString([8])],
            'Multiple 7'          => [14, self::digitsToString([7])],
            'Multiple 3'          => [9, self::digitsToString([3])],
            'Multiples 8 & 7'     => [56, self::digitsToString([8, 7])],
            'Multiples 8 & 3'     => [24, self::digitsToString([8, 3])],
            'Multiples 7 & 3'     => [21, self::digitsToString([7, 3])],
            'Multiples 8 & 7 & 3' => [48, self::digitsToString([8, 7, 3])],
        ];
    }

    /**
     * Converts an array of digits to a string.
     *
     * @param array $digits
     * @return string
     */
    protected static function digitsToString(array $digits): string
    {
        $words = [];

        foreach ($digits as $number) {
            if (isset(self::DIGIT_DICTIONARY[$number])) {
                $words[] = self::DIGIT_DICTIONARY[$number];
            }
        }

        return implode('; ', $words);
    }

    /**
     * Provides valid input for the test of only occurrences.
     *
     * @return array
     */
    public static function occurrencesProvider(): array
    {
        return [
            'Contains 8'         => [38, self::digitsToString([8])],
            'Contains 7'         => [17, self::digitsToString([7])],
            'Contains 3'         => [13, self::digitsToString([3])],
            'Contains 8 & 3'     => [83, self::digitsToString([8, 3])],
            'Contains 8 & 7'     => [874, self::digitsToString([8, 7])],
            'Contains 7 & 3'     => [73, self::digitsToString([7, 3])],
            'Contains 8 & 7 & 3' => [873, self::digitsToString([8, 7, 3])],
            'Contains 3 & 8 & 7' => [3874, self::digitsToString([3, 8, 7])],
        ];
    }

    /**
     * Provides valid input for the test of multiples and occurrences.
     *
     * @return array
     */
    public static function multiplesAndOccurrencesProvider(): array
    {
        return [
            'Multiple 8 | Contains 3'                 => [32, self::digitsToString([8, 3])],
            'Multiple 8 & 7 | Contains 7 & 8'         => [728, self::digitsToString([8, 7, 7, 8])],
            'Multiple 8 & 7 & 3 | Contains 3 & 3'     => [336, self::digitsToString([8, 7, 3, 3, 3])],
            'Multiple 8 & 7 & 3 | Contains 3 & 8 '    => [4368, self::digitsToString([8, 7, 3, 3, 8])],
            'Multiple 8 & 7 | Contains 7 & 8 & 7 & 3' => [78736, self::digitsToString([8, 7, 7, 8, 7, 3])],
        ];
    }

    /**
     * Returns the tested service.
     *
     * @return InfQixFooService
     */
    protected static function getTestedService(): InfQixFooService
    {
        return new InfQixFooService();
    }
}
