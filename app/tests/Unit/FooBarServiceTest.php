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
    /**
     * Provides valid input for the testProcessNumber test.
     *
     * @return array
     */
    public static function fooBarServiceProvider(): array
    {
        return [
            [3, 'Foo'],
            [9, 'Foo'],
            [5, 'Bar'],
            [10, 'Bar'],
            [15, 'FooBar'],
            [45, 'FooBar'],
            [4, '4'],
            [11, '11'],
        ];
    }

    /**
     * Provides invalid input for the testInvalidInputThrowsException test.
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
     * Provides invalid input types for the testInvalidTypeInputThrowsException test.
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
     * Tests that the correct result is returned for a given number.
     *
     * @param $number
     * @param $expectedResult
     * @return void
     */
    #[DataProvider('fooBarServiceProvider')]
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
