<?php declare(strict_types=1);

namespace unit;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use stdClass;

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
    public static function invalidInputProvider(): array
    {
        return [
            [-3],
            [0],
            [3.14159],
            ['string'],
            [null],
            [false],
            [[]],
            [new stdClass()]
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
     * Tests that an invalid input throws an exception.
     *
     * @param $invalidInput
     * @return void
     */
    #[DataProvider('invalidInputProvider')]
    public function testInvalidInputThrowsException ($invalidInput): void
    {
        $service = new FooBarService();

        $this->expectException(InvalidArgumentException::class);
        $service->processNumber($invalidInput);
    }
}
