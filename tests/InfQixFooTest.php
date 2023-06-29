<?php declare(strict_types=1);

use App\NumberTransformationCalculator;
use App\Rules\InfQixFooRule;

class InfQixFooTest extends PHPUnit\Framework\TestCase
{
    public function testInf(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Inf', $infQixFoo->execute(40));
        $this->assertEquals('Inf', $infQixFoo->execute(16));
        $this->assertEquals('Inf', $infQixFoo->execute(64));
    }

    public function testInfOccurrence(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Inf', $infQixFoo->execute(82));
    }

    public function testInfQix(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Inf; Qix', $infQixFoo->execute(56));
    }

    public function testInfQixOccurrence(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Inf; Qix', $infQixFoo->execute(187));
    }

    public function testInfFoo(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Inf; Foo', $infQixFoo->execute(24));
    }

    public function testInfFooOccurrence(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Inf; Foo', $infQixFoo->execute(83));
    }

    public function testQixFoo(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Qix; Foo', $infQixFoo->execute(21));
    }

    public function testQixFooOccurrence(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Qix; Foo', $infQixFoo->execute(73));
    }

    public function testInfQixFoo(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Inf; Qix; Foo', $infQixFoo->execute(504));
    }

    public function testInfQixFooOccurrence(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Inf; Qix; Foo', $infQixFoo->execute(8731));
    }

    public function testMultipleAndOccurrence(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('Inf; Qix; Qix; Inf', $infQixFoo->execute(728));
    }

    public function testNoTransformation(): void
    {
        $infQixFoo = new NumberTransformationCalculator(new InfQixFooRule());
        $this->assertEquals('1', $infQixFoo->execute(1));
        $this->assertEquals('19', $infQixFoo->execute(19));
        $this->assertEquals('22', $infQixFoo->execute(22));
    }
}
