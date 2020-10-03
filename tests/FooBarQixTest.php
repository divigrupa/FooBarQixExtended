<?php declare(strict_types=1);

/**
 * A test class to check if the class `FooBarQix` is working correctly
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
final class FooBarQixTest extends CommonServiceTestCase
{
    /**
     * Name of the class to be tested
     *
     * @var string
     */
    protected string $className = 'FooBarQix';

    /**
     * Test the given values if they are completely Foo, Bar and Qix
     *
     * Test the given integers if they are divisible by Foo, Bar and Qix and if
     * Foo, Bar and Qix digits occur in them.
     *
     * @return void
     */
    final public function testValueHasMultipliersAndContainsFooBarAndQix(): void
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
    final public function testValueHasMultipliersAndContainsFooAndBar(): void
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
    final public function testValueHasMultipliersAndContainsFooAndQix(): void
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
    final public function testValueHasMultipliersAndContainsBarAndQix(): void
    {
        $this->assertSame("Bar, Qix, Qix, Bar", FooBarQix::process(175));
        $this->assertSame("Bar, Qix, Bar, Qix, Bar", FooBarQix::process(15785));
    }

    /**
     * Test the given value if it only is divisible by and contains Foo
     *
     * The integer must neither be divisible by nor contain Bar and Qix.
     *
     * @return void
     */
    final public function testValueOnlyHasMultiplierAndContainsFoo(): void
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
    final public function testValueHasMultiplierAndContainsBar(): void
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
    final public function testValueHasMultiplierAndContainsQix(): void
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
    final public function testValueOnlyHasMultipliersFooBarAndQix(): void
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
    final public function testValueOnlyHasMultipliersFooAndBar(): void
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
    final public function testValueOnlyHasMultipliersFooAndQix(): void
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
    final public function testValueOnlyHasMultipliersBarAndQix(): void
    {
        $this->assertSame("Bar, Qix", FooBarQix::process(280));
    }

    /**
     * Test the given value if it only is divisible by Bar
     *
     * The integer must neither contain Foo, Bar and Qix nor be divisible by
     * Bar and Qix.
     *
     * @return void
     */
    final public function testValueOnlyHasMultiplierBar(): void
    {
        $this->assertSame("Bar", FooBarQix::process(10));
    }

    /**
     * Test the given value if it only contains Foo, Bar and Qix
     *
     * The integer must not be divisible by Foo, Bar and Qix.
     *
     * @return void
     */
    final public function testValueOnlyContainsFooBarAndQix(): void
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
    final public function testValueOnlyContainsFooAndBar(): void
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
    final public function testValueOnlyContainsFooAndQix(): void
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
    final public function testValueOnlyContainsBarAndQix(): void
    {
        $this->assertSame("571, Bar, Qix", FooBarQix::process(571));
        $this->assertSame("754, Qix, Bar", FooBarQix::process(754));
    }

    /**
     * Test the given value if it only contains Bar
     *
     * The integer must neither be divisible by Foo, Bar and Qix nor contain
     * Foo and Qix.
     *
     * @return void
     */
    final public function testValueOnlyContainsBar(): void
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
    final public function testValueOnlyContainsQix(): void
    {
        $this->assertSame("71, Qix", FooBarQix::process(71));
    }

    /**
     * Test the given value if it only contains Foo
     *
     * The integer must neither be divisible by Foo, Bar and Qix nor contain
     * Bar and Qix.
     *
     * @return void
     */
    final public function testValueOnlyContainsFoo(): void
    {
        $this->assertSame("13, Foo", FooBarQix::process(13));
        $this->assertSame("31, Foo", FooBarQix::process(31));
        $this->assertSame("313, Foo, Foo", FooBarQix::process(313));
    }

    /**
     * Test if an integer can be provided as a string
     *
     * @return void
     */
    final public function testInputCanBeString(): void
    {
        $this->assertSame("2", FooBarQix::process("2"));
        $this->assertSame("Foo", FooBarQix::process("12"));
        $this->assertSame("Bar", FooBarQix::process("20"));
        $this->assertSame("Qix", FooBarQix::process("28"));
        $this->assertSame("Foo, Bar", FooBarQix::process("90"));
        $this->assertSame("Foo, Qix", FooBarQix::process("84"));
        $this->assertSame("Bar, Qix", FooBarQix::process("140"));
        $this->assertSame("Foo, Bar, Qix", FooBarQix::process("420"));
        $this->assertSame("Foo, Bar, Foo, Bar", FooBarQix::process("345"));
        $this->assertSame("13571, Foo, Bar, Qix", FooBarQix::process("13571"));
    }
}
