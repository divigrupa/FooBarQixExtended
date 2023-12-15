<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./InfQixFoo.php");

class InfQixFooMultiplesTest extends TestCase
{
    public function testMultiplesOf8ReturnsInf(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf", $infqixfoo->checkMultiples(8));
        $this->assertSame("Inf", $infqixfoo->checkMultiples(16));
    }

    public function testMultiplesOf7ReturnsQix(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Qix", $infqixfoo->checkMultiples(7));
        $this->assertSame("Qix", $infqixfoo->checkMultiples(14));
    }

    public function testMultiplesOf3ReturnsFoo(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Foo", $infqixfoo->checkMultiples(3));
        $this->assertSame("Foo", $infqixfoo->checkMultiples(6));
    }

    public function testMultiplesOf8and7ReturnsInfQix(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf;Qix", $infqixfoo->checkMultiples(56));
        $this->assertSame("Inf;Qix", $infqixfoo->checkMultiples(112));
    }

    public function testMultiplesOf8and3ReturnsInfFoo(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf;Foo", $infqixfoo->checkMultiples(24));
        $this->assertSame("Inf;Foo", $infqixfoo->checkMultiples(48));
    }

    public function testMultiplesOf7and3ReturnsQixFoo(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Qix;Foo", $infqixfoo->checkMultiples(21));
        $this->assertSame("Qix;Foo", $infqixfoo->checkMultiples(42));
    }

    public function testMultiplesOf8and7And3ReturnsInfQixFoo(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf;Qix;Foo", $infqixfoo->checkMultiples(168));
        $this->assertSame("Inf;Qix;Foo", $infqixfoo->checkMultiples(336));
    }
    
    public function testNonMultiplesReturnsNumberAsString(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("1", $infqixfoo->checkMultiples(1));
        $this->assertSame("4", $infqixfoo->checkMultiples(4));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkMultiples("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkMultiples(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkMultiples(-1);
    }
}
