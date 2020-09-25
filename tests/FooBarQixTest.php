<?php declare(strict_types=1);

/**
 * A test class to check if the class `FooBarQix` is working correctly
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
final class FooBarQixTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test an invalid input - a negative integer
     *
     * A valid input is positive integer.
     *
     * @return void
     */
    public function testNegativeIntegerIsNotAValidInput(): void
    {
        $this->expectException(InvalidArgumentException::class);
        FooBarQix::process(-1);
    }

    /**
     * Test an invalid input - a zero
     *
     * A valid input is positive integer.
     *
     * @return void
     */
    public function testZeroIsNotAValidInput(): void
    {
        $this->expectException(InvalidArgumentException::class);
        FooBarQix::process(0);
    }

    /**
     * Test an invalid input - a float
     *
     * A valid input is positive integer.
     *
     * @return void
     */
    public function testFloatIsNotAValidInput(): void
    {
        $this->expectException(InvalidArgumentException::class);
        FooBarQix::process(1.2);
    }

    /**
     * Test an invalid input - a string that doesn't represent positive integer
     *
     * A valid input is positive integer.
     *
     * @return void
     */
    public function testNonintegerStringIsNotAValidInput(): void
    {
        $this->expectException(InvalidArgumentException::class);
        FooBarQix::process("string");
    }

    /**
     * Test the given value if it is Foo, Bar and Qix
     *
     * @return void
     */
    public function testValueIsFooBarQix(): void
    {
        $this->assertSame("Foo, Bar, Qix", FooBarQix::process(210));
    }

    /**
     * Test the given value if it is Foo and Qix
     *
     * @return void
     */
    public function testValueIsFooQix(): void
    {
        $this->assertSame("Foo, Qix", FooBarQix::process(42));
    }

    /**
     * Test the given value if it is Bar and Qix
     *
     * @return void
     */
    public function testValueIsBarQix(): void
    {
        $this->assertSame("Bar, Qix", FooBarQix::process(70));
    }

    /**
     * Test the given value if it is both Foo and Bar
     *
     * @return void
     */
    public function testValueIsFooBar(): void
    {
        $this->assertSame("Foo, Bar", FooBarQix::process(15));
    }

    /**
     * Test the given value if it is detected as Foo
     *
     * @return void
     */
    public function testValueIsFoo(): void
    {
        $this->assertSame("Foo", FooBarQix::process(6));
    }

    /**
     * Test the given value if it is detected as Bar
     *
     * @return void
     */
    public function testValueIsBar(): void
    {
        $this->assertSame("Bar", FooBarQix::process(10));
    }

    /**
     * Test the given value if it is detected as Qix
     *
     * @return void
     */
    public function testValueIsQix(): void
    {
        $this->assertSame("Qix", FooBarQix::process(14));
    }

    /**
     * Test an input when it is not detected as Foo, Bar and Qix
     *
     * @return void
     */
    public function testValueIsNotFooBarQix(): void
    {
        $input = 1;
        $output = FooBarQix::process($input);
        $this->assertIsString($output);
        $this->assertEquals($input, $output);
    }

    /**
     * Test if an integer can be provided as a string
     *
     * @return void
     */
    public function testInputCanBeString(): void
    {
        $this->assertSame("2", FooBarQix::process("2"));
        $this->assertSame("Foo", FooBarQix::process("12"));
        $this->assertSame("Bar", FooBarQix::process("20"));
        $this->assertSame("Qix", FooBarQix::process("28"));
        $this->assertSame("Foo, Bar", FooBarQix::process("30"));
        $this->assertSame("Foo, Qix", FooBarQix::process("63"));
        $this->assertSame("Bar, Qix", FooBarQix::process("140"));
        $this->assertSame("Foo, Bar, Qix", FooBarQix::process("315"));
    }
}
