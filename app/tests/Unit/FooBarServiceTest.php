<?php declare(strict_types=1);

namespace App\Tests\Unit;

use App\Service\FooBarService;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use stdClass;
use TypeError;

/**
 * Class FooBarServiceTest
 * @package unit
 */
final class FooBarServiceTest extends TestCase
{
    private const FOO = 'Foo';
    private const BAR = 'Bar';
    private const QIX = 'Qix';
    private const FOOBAR = self::FOO . self::BAR;
    private const BARQIX = self::BAR . self::QIX;
    private const FOOQIX = self::FOO . self::QIX;
    private const FOOBARQIX = self::FOO . self::BAR . self::QIX;

    /**
     * Provides valid input for the test of only multiples.
     *
     * @return array
     */
    public static function multiplesProvider(): array
    {
        return [
            'Multiple 3'          => [6, self::FOO],
            'Multiple 5'          => [10, self::BAR],
            'Multiple 7'          => [14, self::QIX],
            'Multiples 3 & 5'     => [60, self::FOOBAR],
            'Multiples 3 & 7'     => [21, self::FOOQIX],
            'Multiples 5 & 7'     => [140, self::BARQIX],
            'Multiples 3 & 5 & 7' => [210, self::FOOBARQIX],
        ];
    }

    /**
     * Provides valid input for the test of only occurrences.
     *
     * @return array
     */
    public static function occurrencesProvider(): array
    {
        return [
            'Contains 3'         => [13, self::FOO],
            'Contains 5'         => [151, self::BAR],
            'Contains 7'         => [17, self::QIX],
            'Contains 3 & 5'     => [352, self::FOOBAR],
            'Contains 3 & 7'     => [307, self::FOOQIX],
            'Contains 5 & 7'     => [5017, self::BARQIX],
            'Contains 3 & 5 & 7' => [3571, self::FOOBARQIX],
            'Contains 7 & 5 & 3' => [7531, self::QIX . self::BAR . self::FOO],
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
            'Multiple 3 | Contains 7'                     => [27, self::FOOQIX],
            'Multiple 5 & 7 | Contains 3 & 5'             => [35, self::BARQIX . self::FOOBAR],
            'Multiple 3 & 5 & 7  | Contains 5'            => [1050, self::FOOBARQIX . self::BAR],
            'Multiple 3 & 5 & 7 | Contains 7 & 7 & 7'     => [
                7770,
                self::FOOBARQIX . self::QIX . self::QIX . self::QIX
            ],
            'Multiple 3 & 5 | Contains 7 & 7 & 5 & 3 & 5' => [
                77535,
                self::FOOBAR . self::QIX . self::QIX . self::BAR . self::FOOBAR
            ],
        ];
    }

    /**
     * Provides input to test the no-transformation cases.
     *
     * @return array
     */
    public static function noTransformationProvider(): array
    {
        return [
            '1'  => [1, '1'],
            '2'  => [2, '2'],
            '4'  => [4, '4'],
            '8'  => [8, '8'],
            '11' => [11, '11'],
        ];
    }

    /**
     * Provides invalid numeric input.
     *
     * @return array
     */
    public static function invalidNumericInputProvider(): array
    {
        return [
            [-3],
            [0],
        ];
    }

    /**
     * Provides invalid input types.
     *
     * @return array
     */
    public static function invalidTypeInputProvider(): array
    {
        return [
            [3.14159],
            ['string'],
            [null],
            [false],
            [[]],
            [new stdClass()],
        ];
    }

    /**
     * Tests that the processNumber method returns the expected result.
     *
     * @param $number
     * @param $expectedResult
     * @return void
     */
    #[DataProvider('multiplesProvider')]
    #[DataProvider('occurrencesProvider')]
    #[DataProvider('multiplesAndOccurrencesProvider')]
    #[DataProvider('noTransformationProvider')]
    public function testProcessNumber($number, $expectedResult): void
    {
        $service = new FooBarService();

        $this->assertEquals($expectedResult, $service->processNumber($number));
    }

    /**
     * Tests that an invalid numeric input throws an exception.
     *
     * @param $invalidInput
     * @return void
     */
    #[DataProvider('invalidNumericInputProvider')]
    public function testInvalidInputThrowsException($invalidInput): void
    {
        $service = new FooBarService();

        $this->expectException(InvalidArgumentException::class);
        $service->processNumber($invalidInput);
    }

    /**
     * Tests that an invalid type input throws an exception.
     *
     * @param $invalidInput
     * @return void
     */
    #[DataProvider('invalidTypeInputProvider')]
    public function testInvalidTypeInputThrowsException($invalidInput): void
    {
        $service = new FooBarService();

        $this->expectException(TypeError::class);
        $service->processNumber($invalidInput);
    }
}
