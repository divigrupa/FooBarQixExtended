<?php declare(strict_types=1);

/**
 * A test class to check if the class `InfQixFoo` is working correctly
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
final class InfQixFooTest extends CommonServiceTestCase
{
    /**
     * Name of the class to be tested
     *
     * @var string
     */
    protected string $className = 'InfQixFoo';

    /**
     * Test the given values if they are completely Inf, Qix and Foo
     *
     * Test the given integers if they are divisible by Inf, Qix and Foo and if
     * Inf, Qix and Foo digits occur in them.
     *
     * @return void
     */
    final public function testValueHasMultipliersAndContainsInfQixAndFoo(): void
    {
        $this->assertSame(
            "Inf; Qix; Foo; Foo; Foo; Qix; Inf",
            InfQixFoo::process(33768)
        );
        $this->assertSame(
            "Inf; Qix; Foo; Foo; Qix; Inf",
            InfQixFoo::process(35784)
        );
        $this->assertSame(
            "Inf; Qix; Foo; Inf; Foo; Qix",
            InfQixFoo::process(68376)
        );
    }

    /**
     * Test the given value if it is divisible by and contains Inf and Qix
     *
     * The integer must neither be divisible by nor contain Foo.
     *
     * @return void
     */
    final public function testValueOnlyHasMultipliersAndContainsInfAndQix(): void
    {
        $this->assertSame("Inf; Qix; Inf; Qix", InfQixFoo::process(8176));
        $this->assertSame("Inf; Qix; Qix; Inf", InfQixFoo::process(728));
        $this->assertSame("Inf; Qix; Qix; Qix; Inf", InfQixFoo::process(7784));
    }

    /**
     * Test the given value if it is divisible by and contains Qix and Foo
     *
     * The integer must neither be divisible by nor contain Inf.
     *
     * @return void
     */
    final public function testValueOnlyHasMultipliersAndContainsQixAndFoo(): void
    {
        $this->assertSame("Qix; Foo; Qix; Foo", InfQixFoo::process(273));
        $this->assertSame("Qix; Foo; Foo; Qix", InfQixFoo::process(357));
        $this->assertSame("Qix; Foo; Foo; Qix; Foo", InfQixFoo::process(2373));
    }

    /**
     * Test the given value if it is divisible by and contains Inf and Foo
     *
     * The integer must neither be divisible by nor contain Qix.
     *
     * @return void
     */
    final public function testValueOnlyHasMultipliersAndContainsInfAndFoo(): void
    {
        $this->assertSame("Inf; Foo; Foo; Inf", InfQixFoo::process(384));
        $this->assertSame("Inf; Foo; Inf; Foo", InfQixFoo::process(2832));
        $this->assertSame("Inf; Foo; Foo; Inf; Inf", InfQixFoo::process(3288));
    }

    /**
     * Test the given value if it only is divisible by and contains Inf
     *
     * The integer must neither be divisible by nor contain Qix and Foo.
     *
     * @return void
     */
    final public function testValueOnlyHasMultiplierAndContainsInf(): void
    {
        $this->assertSame("Inf; Inf", InfQixFoo::process(128));
        $this->assertSame("Inf; Inf; Inf", InfQixFoo::process(488));
    }

    /**
     * Test the given value if it only is divisible by and contains Qix
     *
     * The integer must neither be divisible by nor contain Inf and Foo.
     *
     * @return void
     */
    final public function testValueOnlyHasMultiplierAndContainsQix(): void
    {
        $this->assertSame("Qix; Qix", InfQixFoo::process(7));
        $this->assertSame("Qix; Qix; Qix", InfQixFoo::process(77));
    }

    /**
     * Test the given value if it only is divisible by and contains Foo
     *
     * The integer must neither be divisible by nor contain Inf and Qix.
     *
     * @return void
     */
    public function testValueOnlyHasMultiplierAndContainsFoo(): void
    {
        $this->assertSame("Foo; Foo", InfQixFoo::process(3));
        $this->assertSame("Foo; Foo; Foo", InfQixFoo::process(33));
    }

    /**
     * Test the given value if it only is divisible by Inf, Qix and Foo
     *
     * The integer must not contain Inf, Qix and Foo.
     *
     * @return void
     */
    final public function testValueOnlyHasMultipliersInfQixAndFoo(): void
    {
        $this->assertSame("Inf; Qix; Foo", InfQixFoo::process(504));
    }

    /**
     * Test the given value if it only is divisible by both Inf and Qix
     *
     * The integer must neither contain Inf, Qix and Foo nor be divisible by
     * Foo.
     *
     * @return void
     */
    final public function testValueOnlyHasMultipliersInfAndQix(): void
    {
        $this->assertSame("Inf; Qix", InfQixFoo::process(112));
    }

    /**
     * Test the given value if it only is divisible by Inf and Foo
     *
     * The integer must neither contain Inf, Qix and Foo nor be divisible by
     * Qix.
     *
     * @return void
     */
    final public function testValueOnlyHasMultipliersInfAndFoo(): void
    {
        $this->assertSame("Inf; Foo", InfQixFoo::process(24));
    }

    /**
     * Test the given value if it only is divisible by Qix and Foo
     *
     * The integer must neither contain Inf, Qix and Foo nor be divisible by
     * Inf.
     *
     * @return void
     */
    final public function testValueOnlyHasMultipliersQixAndFoo(): void
    {
        $this->assertSame("Qix; Foo", InfQixFoo::process(21));
    }

    /**
     * Test the given value if it only is divisible by Inf
     *
     * The integer must neither contain Inf, Qix and Foo nor be divisible by
     * Qix and Foo.
     *
     * @return void
     */
    final public function testValueOnlyHasMultiplierInf(): void
    {
        $this->assertSame("Inf", InfQixFoo::process(16));
    }

    /**
     * Test the given value if it only has occurrences of Inf, Qix and Foo
     *
     * The integer must not be divisible by Inf, Qix and Foo.
     *
     * @return void
     */
    final public function testValueOnlyContainsInfQixAndFoo(): void
    {
        $this->assertSame("1378; Foo; Qix; Inf", InfQixFoo::process(1378));
        $this->assertSame("1387; Foo; Inf; Qix", InfQixFoo::process(1387));
        $this->assertSame("1837; Inf; Foo; Qix", InfQixFoo::process(1837));
    }

    /**
     * Test the given value if it only contains Inf and Qix
     *
     * The integer must neither be divisible by Inf, Qix and Foo nor contain
     * Foo.
     *
     * @return void
     */
    final public function testValueOnlyContainsInfAndQix(): void
    {
        $this->assertSame("278; Qix; Inf", InfQixFoo::process(278));
        $this->assertSame("487; Inf; Qix", InfQixFoo::process(487));
        $this->assertSame("787; Qix; Inf; Qix", InfQixFoo::process(787));
    }

    /**
     * Test the given value if it contains Inf and Foo
     *
     * The integer must neither be divisible by Inf, Qix and Foo nor contain
     * Qix.
     *
     * @return void
     */
    final public function testValueOnlyContainsInfAndFoo(): void
    {
        $this->assertSame("38; Foo; Inf", InfQixFoo::process(38));
        $this->assertSame("83; Inf; Foo", InfQixFoo::process(83));
        $this->assertSame("338; Foo; Foo; Inf", InfQixFoo::process(338));
    }

    /**
     * Test the given value if it contains Qix and Foo
     *
     * The integer must neither be divisible by Inf, Qix and Foo nor contain
     * Inf.
     *
     * @return void
     */
    final public function testValueOnlyContainsQixAndFoo(): void
    {
        $this->assertSame("37; Foo; Qix", InfQixFoo::process(37));
        $this->assertSame("73; Qix; Foo", InfQixFoo::process(73));
        $this->assertSame("337; Foo; Foo; Qix", InfQixFoo::process(337));
    }

    /**
     * Test the given value if it only contains Inf
     *
     * The integer must neither be divisible by Inf, Qix and Foo nor contain
     * Qix and Foo.
     *
     * @return void
     */
    final public function testValueOnlyContainsInf(): void
    {
        $this->assertSame("58; Inf", InfQixFoo::process(58));
        $this->assertSame("188; Inf; Inf", InfQixFoo::process(188));
    }

    /**
     * Test the given value if it only contains Qix
     *
     * The integer must neither be divisible by Inf, Qix and Foo nor contain
     * Inf and Foo.
     *
     * @return void
     */
    final public function testValueOnlyContainsQix(): void
    {
        $this->assertSame("47; Qix", InfQixFoo::process(47));
        $this->assertSame("577; Qix; Qix", InfQixFoo::process(577));
    }

    /**
     * Test the given value if it only contains Foo
     *
     * The integer must neither be divisible by Inf, Qix and Foo nor contain
     * Inf and Qix.
     *
     * @return void
     */
    final public function testValueOnlyContainsFoo(): void
    {
        $this->assertSame("13; Foo", InfQixFoo::process(13));
        $this->assertSame("313; Foo; Foo", InfQixFoo::process(313));
    }

    /**
     * Test if an integer can be provided as a string
     *
     * @return void
     */
    final public function testInputCanBeString(): void
    {
        $this->assertSame("4", InfQixFoo::process("4"));
        $this->assertSame("Inf", InfQixFoo::process("40"));
        $this->assertSame("Inf; Foo", InfQixFoo::process("96"));
        $this->assertSame("Inf; Qix; Foo", InfQixFoo::process("1512"));
        $this->assertSame("Foo; Inf; Qix; Foo", InfQixFoo::process("873"));
        $this->assertSame("2837; Inf; Foo; Qix", InfQixFoo::process("2837"));
    }

    /**
     * Test if the sum of all input integer's digits is divisible by 8
     *
     * @return void
     */
    final public function testSumOfAllValueDigitsIsDivisibleBy8(): void
    {
        $this->assertSame("Inf; InfInf", InfQixFoo::process(8));
        $this->assertSame("17; QixInf", InfQixFoo::process(17));
        $this->assertSame("26Inf", InfQixFoo::process(26));
    }
}
