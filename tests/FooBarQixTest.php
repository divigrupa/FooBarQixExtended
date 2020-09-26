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
     * Test the given values if they are completely Foo, Bar and Qix
     *
     * Test the given integers if they are divisible by Foo, Bar and Qix and if
     * Foo, Bar and Qix digits occur in them.
     *
     * @return void
     */
    public function testValueHasMultipliersAndContainsFooBarAndQix(): void
    {
        $this->assertSame(
            "Foo, Bar, Qix, Qix, Foo, Bar",
            FooBarQix::process(735)
        );
        $this->assertSame(
            "Foo, Bar, Qix, Foo, Bar, Qix",
            FooBarQix::process(3570)
        );
        $this->assertSame(
            "Foo, Bar, Qix, Foo, Qix, Bar",
            FooBarQix::process(3675)
        );
    }

    /**
     * Test the given value if it is divisible by and contains Foo and Bar
     *
     * The integer must neither be divisible by nor contain Qix.
     *
     * @return void
     */
    public function testValueHasMultipliersAndContainsFooAndBar(): void
    {
        $this->assertSame("Foo, Bar, Foo, Bar", FooBarQix::process(135));
        $this->assertSame("Foo, Bar, Foo, Foo, Bar", FooBarQix::process(1335));
        $this->assertSame("Foo, Bar, Bar, Foo", FooBarQix::process(1530));
    }

    /**
     * Test the given value if it is divisible by and contains Foo and Qix
     *
     * The integer must neither be divisible by nor contain Bar.
     *
     * @return void
     */
    public function testValueHasMultipliersAndContainsFooAndQix(): void
    {
        $this->assertSame("Foo, Qix, Qix, Foo", FooBarQix::process(273));
        $this->assertSame("Foo, Qix, Foo, Qix", FooBarQix::process(378));
        $this->assertSame("Foo, Qix, Foo, Qix, Foo", FooBarQix::process(2373));
    }

    /**
     * Test the given value if it is divisible by and contains Bar and Qix
     *
     * The integer must neither be divisible by nor contain Foo.
     *
     * @return void
     */
    public function testValueHasMultipliersAndContainsBarAndQix(): void
    {
        $this->assertSame("Bar, Qix, Qix, Bar", FooBarQix::process(175));
        $this->assertSame("Bar, Qix, Bar, Qix, Bar", FooBarQix::process(1575));
    }

    /**
     * Test the given value if it only is divisible by and contains Foo
     *
     * The integer must neither be divisible by nor contain Bar and Qix.
     *
     * @return void
     */
    public function testValueHasMultiplierAndContainsFoo(): void
    {
        $this->assertSame("Foo, Foo", FooBarQix::process(36));
        $this->assertSame("Foo, Foo, Foo", FooBarQix::process(33));
    }

    /**
     * Test the given value if it only is divisible by and contains Bar
     *
     * The integer must neither be divisible by nor contain Foo and Qix.
     *
     * @return void
     */
    public function testValueHasMultiplierAndContainsBar(): void
    {
        $this->assertSame("Bar, Bar", FooBarQix::process(50));
        $this->assertSame("Bar, Bar, Bar", FooBarQix::process(55));
    }

    /**
     * Test the given value if it only is divisible by and contains Qix
     *
     * The integer must neither be divisible by nor contain Foo and Bar.
     *
     * @return void
     */
    public function testValueHasMultiplierAndContainsQix(): void
    {
        $this->assertSame("Qix, Qix", FooBarQix::process(217));
        $this->assertSame("Qix, Qix, Qix", FooBarQix::process(77));
    }

    /**
     * Test the given value if it only is divisible by Foo, Bar and Qix
     *
     * The integer must not contain Foo, Bar and Qix.
     *
     * @return void
     */
    public function testValueOnlyHasMultipliersFooBarAndQix(): void
    {
        $this->assertSame("Foo, Bar, Qix", FooBarQix::process(210));
    }

    /**
     * Test the given value if it only is divisible by both Foo and Bar
     *
     * The integer must neither contain Foo, Bar and Qix nor be divisible by
     * Qix.
     *
     * @return void
     */
    public function testValueOnlyHasMultipliersFooAndBar(): void
    {
        $this->assertSame("Foo, Bar", FooBarQix::process(60));
    }

    /**
     * Test the given value if it only is divisible by Foo and Qix
     *
     * The integer must neither contain Foo, Bar and Qix nor be divisible by
     * Bar.
     *
     * @return void
     */
    public function testValueOnlyHasMultipliersFooAndQix(): void
    {
        $this->assertSame("Foo, Qix", FooBarQix::process(42));
    }

    /**
     * Test the given value if it only is divisible by Bar and Qix
     *
     * The integer must neither contain Foo, Bar and Qix nor be divisible by
     * Foo.
     *
     * @return void
     */
    public function testValueOnlyHasMultipliersBarAndQix(): void
    {
        $this->assertSame("Bar, Qix", FooBarQix::process(280));
    }

    /**
     * Test the given value if it only is divisible by Foo
     *
     * The integer must neither contain Foo, Bar and Qix nor be divisible by
     * Bar and Qix.
     *
     * @return void
     */
    public function testValueOnlyHasMultiplierFoo(): void
    {
        $this->assertSame("Foo", FooBarQix::process(6));
    }

    /**
     * Test the given value if it only is divisible by Bar
     *
     * The integer must neither contain Foo, Bar and Qix nor be divisible by
     * Bar and Qix.
     *
     * @return void
     */
    public function testValueOnlyHasMultiplierBar(): void
    {
        $this->assertSame("Bar", FooBarQix::process(10));
    }

    /**
     * Test the given value if it only is divisible by Qix
     *
     * The integer must neither contain Foo, Bar and Qix nor be divisible by
     * Foo and Bar.
     *
     * @return void
     */
    public function testValueOnlyHasMultiplierQix(): void
    {
        $this->assertSame("Qix", FooBarQix::process(14));
    }

    /**
     * Test the given value if it only contains Foo, Bar and Qix
     *
     * The integer must not be divisible by Foo, Bar and Qix.
     *
     * @return void
     */
    public function testValueOnlyContainsFooBarAndQix(): void
    {
        $this->assertSame("34567, Foo, Bar, Qix", FooBarQix::process(34567));
        $this->assertSame("456731, Bar, Qix, Foo", FooBarQix::process(456731));
        $this->assertSame("7354, Qix, Foo, Bar", FooBarQix::process(7354));
        $this->assertSame("3754, Foo, Qix, Bar", FooBarQix::process(3754));
        $this->assertSame("5732, Bar, Qix, Foo", FooBarQix::process(5732));
        $this->assertSame("67532, Qix, Bar, Foo", FooBarQix::process(67532));
    }

    /**
     * Test the given value if it only contains Foo and Bar
     *
     * The integer must neither be divisible by Foo, Bar and Qix nor contain
     * Qix.
     *
     * @return void
     */
    public function testValueOnlyContainsFooAndBar(): void
    {
        $this->assertSame("352, Foo, Bar", FooBarQix::process(352));
        $this->assertSame("53, Bar, Foo", FooBarQix::process(53));
        $this->assertSame("353, Foo, Bar, Foo", FooBarQix::process(353));
    }

    /**
     * Test the given value if it contains Foo and Qix
     *
     * The integer must neither be divisible by Foo, Bar and Qix nor contain
     * Bar.
     *
     * @return void
     */
    public function testValueOnlyContainsFooAndQix(): void
    {
        $this->assertSame("37, Foo, Qix", FooBarQix::process(37));
        $this->assertSame("73, Qix, Foo", FooBarQix::process(73));
    }

    /**
     * Test the given value if it contains Bar and Qix
     *
     * The integer must neither be divisible by Foo, Bar and Qix nor contain
     * Foo.
     *
     * @return void
     */
    public function testValueOnlyContainsBarAndQix(): void
    {
        $this->assertSame("571, Bar, Qix", FooBarQix::process(571));
        $this->assertSame("754, Qix, Bar", FooBarQix::process(754));
    }

    /**
     * Test the given value if it only contains Foo
     *
     * The integer must neither be divisible by Foo, Bar and Qix nor contain
     * Bar and Qix.
     *
     * @return void
     */
    public function testValueOnlyContainsFoo(): void
    {
        $this->assertSame("31, Foo", FooBarQix::process(31));
    }

    /**
     * Test the given value if it only contains Bar
     *
     * The integer must neither be divisible by Foo, Bar and Qix nor contain
     * Foo and Qix.
     *
     * @return void
     */
    public function testValueOnlyContainsBar(): void
    {
        $this->assertSame("52, Bar", FooBarQix::process(52));
    }

    /**
     * Test the given value if it only contains Qix
     *
     * The integer must neither be divisible by Foo, Bar and Qix nor contain
     * Foo and Bar.
     *
     * @return void
     */
    public function testValueOnlyContainsQix(): void
    {
        $this->assertSame("71, Qix", FooBarQix::process(71));
    }

    /**
     * Test an input when it is not detected as nor contains Foo, Bar and Qix
     *
     * Test if the given integer is not divisible by Foo, Bar and Qix and it
     * does not contain Foo, Bar and Qix.
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
        $this->assertSame("Foo, Bar, Foo, Bar", FooBarQix::process("345"));
        $this->assertSame("13571, Foo, Bar, Qix", FooBarQix::process("13571"));
    }
}
