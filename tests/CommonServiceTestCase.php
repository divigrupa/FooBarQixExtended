<?php declare(strict_types=1);

/**
 * A test class to check if the class `InfQixFoo` is working correctly
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class CommonServiceTestCase extends PHPUnit\Framework\TestCase
{
    /**
     * Name of the class to run test methods againsts
     *
     * @var string
     */
    protected string $className;

    /**
     * Test an invalid input - a negative integer
     *
     * A valid input is positive integer.
     *
     * @return void
     */
    final public function testNegativeIntegerIsNotAValidInput(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->className::process(-1);
    }

    /**
     * Test an invalid input - a zero
     *
     * A valid input is positive integer.
     *
     * @return void
     */
    final public function testZeroIsNotAValidInput(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->className::process(0);
    }

    /**
     * Test an invalid input - a float
     *
     * A valid input is positive integer.
     *
     * @return void
     */
    final public function testFloatIsNotAValidInput(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->className::process(1.2);
    }

    /**
     * Test an invalid input - a string that doesn't represent positive integer
     *
     * A valid input is positive integer.
     *
     * @return void
     */
    final public function testNonintegerStringIsNotAValidInput(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->className::process("string");
    }

    /**
     * Test the given value if it only is divisible by Foo
     *
     * The integer must neither contain Foo, Bar and Qix nor be divisible by
     * Bar and Qix.
     *
     * @return void
     */
    final public function testValueOnlyHasMultiplierFoo(): void
    {
        $this->assertSame("Foo", FooBarQix::process(6));
    }

    /**
     * Test the given value if it only is divisible by Qix
     *
     * The integer must neither contain Foo, Bar and Qix nor be divisible by
     * Foo and Bar.
     *
     * @return void
     */
    final public function testValueOnlyHasMultiplierQix(): void
    {
        $this->assertSame("Qix", FooBarQix::process(14));
    }

    /**
     * Test an input when it is not detected as nor contains Foo, Bar and Qix
     *
     * Test if the given integer is not divisible by Foo, Bar and Qix and it
     * does not contain Foo, Bar and Qix.
     *
     * @return void
     */
    final public function testValueIsNotTransformed(): void
    {
        $input = 1;
        $output = $this->className::process($input);
        $this->assertIsString($output);
        $this->assertEquals($input, $output);
    }
}
