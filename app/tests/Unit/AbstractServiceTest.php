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
    /**
     * Contains the service being tested.
     *
     * @var AbstractService $testedService
     */
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

    /**
     * Provider of valid input to the test only multiples.
     *
     * @return array
     */
    abstract public static function multiplesProvider(): array;

    /**
     * Provider of valid input to the test only occurrences.
     *
     * @return array
     */
    abstract public static function occurrencesProvider(): array;

    /**
     * Provider of valid input to the test multiples and occurrences together.
     *
     * @return array
     */
    abstract public static function multiplesAndOccurrencesProvider(): array;

    /**
     * Provider of valid input to the test no transformation cases.
     *
     * @return array
     */
    abstract public static function noTransformationProvider(): array;

    /**
     * Get expected result for the given multiples and occurrences.
     *
     * @param array $mult
     * @param array $occur
     * @return string
     */
    protected static function getExpectedResult(array $mult = [], array $occur = []): string
    {
        $words = [];
        $result = '';
        $separator = static::getSeparator();
        $digitDictionary = static::getDigitDictionary();

        // Process multiples
        foreach ($mult as $digit) {
            if (isset($digitDictionary[$digit])) {
                $words[] = $digitDictionary[$digit];
            }
        }

        $result .= implode($separator, $words);

        // Process occurrences
        foreach ($occur as $digit) {
            if (isset($digitDictionary[$digit])) {
                $result .= $digitDictionary[$digit];
            }
        }

        return $result;
    }

    /**
     * Returns the separator used to join the words.
     *
     * @return string
     */
    abstract protected static function getSeparator(): string;

    /**
     * Returns the dictionary of words.
     *
     * @return array
     */
    abstract protected static function getDigitDictionary(): array;

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

    /**
     * Returns the service being tested.
     *
     * @return AbstractService
     */
    abstract protected static function getTestedService(): AbstractService;
}
