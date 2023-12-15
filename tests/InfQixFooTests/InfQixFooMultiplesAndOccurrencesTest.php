<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./InfQixFoo.php");

class InfQixFooMultiplesAndOccurrencesTest extends TestCase
{
    public function testReturnsNumberAsStringIfNoTransformation(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("1", $infqixfoo->checkMultiplesAndOccurrences(1));
    }

    public function testReturnsMultiplesAndOccurrencesOf8(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf", $infqixfoo->checkMultiplesAndOccurrences(16));
        $this->assertSame("Inf", $infqixfoo->checkMultiplesAndOccurrences(89));
        $this->assertSame("InfInf", $infqixfoo->checkMultiplesAndOccurrences(8));
        $this->assertSame("InfInfInf", $infqixfoo->checkMultiplesAndOccurrences(88));
    }

    public function testReturnsMultiplesAndOccurrencesOf7(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Qix", $infqixfoo->checkMultiplesAndOccurrences(49));
        $this->assertSame("Qix", $infqixfoo->checkMultiplesAndOccurrences(71));
        $this->assertSame("QixQix", $infqixfoo->checkMultiplesAndOccurrences(7));
        $this->assertSame("QixQixQix", $infqixfoo->checkMultiplesAndOccurrences(77));
    }

    public function testReturnsMultiplesAndOccurrencesOf3(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Foo", $infqixfoo->checkMultiplesAndOccurrences(9));
        $this->assertSame("Foo", $infqixfoo->checkMultiplesAndOccurrences(13));
        $this->assertSame("FooFoo", $infqixfoo->checkMultiplesAndOccurrences(3));
        $this->assertSame("FooFooFoo", $infqixfoo->checkMultiplesAndOccurrences(33));
    }

    public function testReturnsMultiplesAndOccurrencesOf8And7(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf;Qix", $infqixfoo->checkMultiplesAndOccurrences(56));
        $this->assertSame("Inf;QixInf", $infqixfoo->checkMultiplesAndOccurrences(448));
        $this->assertSame("Inf;QixQixInf", $infqixfoo->checkMultiplesAndOccurrences(784));
    }

    public function testReturnsMultiplesAndOccurrencesOf8And3(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf;Foo", $infqixfoo->checkMultiplesAndOccurrences(24));
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf;FooInf", $infqixfoo->checkMultiplesAndOccurrences(48));
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf;FooFoo", $infqixfoo->checkMultiplesAndOccurrences(312));
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf;FooFooInf", $infqixfoo->checkMultiplesAndOccurrences(384));
    }

    public function testReturnsMultiplesAndOccurrencesOf7And3(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Qix;Foo", $infqixfoo->checkMultiplesAndOccurrences(21));
        $this->assertSame("Qix;FooFoo", $infqixfoo->checkMultiplesAndOccurrences(63));
        $this->assertSame("Qix;FooQix", $infqixfoo->checkMultiplesAndOccurrences(147));
        $this->assertSame("Qix;FooQixFoo", $infqixfoo->checkMultiplesAndOccurrences(273));
    }

    public function testReturnsMultiplesAndOccurrencesOf8And7And3(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf;Qix;Foo", $infqixfoo->checkMultiplesAndOccurrences(504));
        $this->assertSame("Inf;Qix;FooInf", $infqixfoo->checkMultiplesAndOccurrences(168));
        $this->assertSame("Inf;Qix;FooInfQixFoo", $infqixfoo->checkMultiplesAndOccurrences(8736));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkMultiplesAndOccurrences("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkMultiplesAndOccurrences(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkMultiplesAndOccurrences(-1);
    }
}
