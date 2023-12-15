<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./InfQixFoo.php");

class InfQixFooMultiplesAndOccurrencesAndSumTest extends TestCase
{
    public function testNoMultiplesNoOccurrencesDoesntAddUpTo8(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("41", $infqixfoo->checkMultiplesAndOccurrencesAndSum(41));
    }

    public function testNoMultiplesNoOccurrencesAddsUpTo8(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("44Inf", $infqixfoo->checkMultiplesAndOccurrencesAndSum(44));
    }

    public function testMultiplesAndOccurrencesAndAddsTo8(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("InfInfInf", $infqixfoo->checkMultiplesAndOccurrencesAndSum(8));
        $this->assertSame("QixInf", $infqixfoo->checkMultiplesAndOccurrencesAndSum(17));
        $this->assertSame("QixFooInf", $infqixfoo->checkMultiplesAndOccurrencesAndSum(35));
    }

    public function testMultiplesAndOccurrencesAndDoesNotAddTo8(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Qix", $infqixfoo->checkMultiplesAndOccurrencesAndSum(74));
        $this->assertSame("QixQix", $infqixfoo->checkMultiplesAndOccurrencesAndSum(70));
        $this->assertSame("Inf;Qix;FooInf", $infqixfoo->checkMultiplesAndOccurrencesAndSum(168));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkMultiplesAndOccurrencesAndSum("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkMultiplesAndOccurrencesAndSum(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkMultiplesAndOccurrencesAndSum(-1);
    }
}
