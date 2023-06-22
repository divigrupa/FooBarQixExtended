<?php declare(strict_types=1);

namespace App\Tests\Unit;

use App\Service\AbstractService;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use stdClass;
use TypeError;

/**
 * Class AbstractServiceTest
 * @package unit
 */
abstract class AbstractServiceTest extends TestCase
{
    protected AbstractService $testedService;

    /**
     * Provides invalid numeric input.
     *
     * @return array
     */
    public static function invalidNumericInputProvider(): array
    {
        return [
            'Negative number' => [-3],
            'Zero'            => [0],
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
            'Type float'   => [3.14159],
            'Type string'  => ['string'],
            'Null'         => [null],
            'Type boolean' => [false],
            'Type array'   => [[]],
            'Type object'  => [new stdClass()],
        ];
    }

    abstract public static function multiplesProvider(): array;

    abstract public static function occurrencesProvider(): array;

    abstract public static function multiplesAndOccurrencesProvider(): array;

    abstract public static function noTransformationProvider(): array;

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
    public function testExpectedServiceResults($number, $expectedResult): void
    {
        $this->assertEquals($expectedResult, $this->testedService->processNumber($number));
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
        $this->expectException(InvalidArgumentException::class);
        $this->testedService->processNumber($invalidInput);
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
        $this->expectException(TypeError::class);
        $this->testedService->processNumber($invalidInput);
    }

    /**
     * Sets up the tested service.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->testedService = static::getTestedService();
    }

    abstract protected static function getTestedService(): AbstractService;
}
