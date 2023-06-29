<?php declare(strict_types=1);

use App\FooBarQix;

class InfQixFooTest extends PHPUnit\Framework\TestCase
{
    public function testInf(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Inf', $fooBarQix->execute(8));
        $this->assertEquals('Inf', $fooBarQix->execute(16));
        $this->assertEquals('Inf', $fooBarQix->execute(24));
    }

    public function testInfOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Inf', $fooBarQix->execute(128));
    }

    public function testInfQix(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Inf; Qix', $fooBarQix->execute(56));
    }

    public function testInfQixOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Inf; Qix', $fooBarQix->execute(187));
    }

    public function testInfFoo(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Inf; Foo', $fooBarQix->execute(24));
    }

    public function testInfFooOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Inf; Foo', $fooBarQix->execute(83));
    }

    public function testQixFoo(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Qix; Foo', $fooBarQix->execute(21));
    }

    public function testQixFooOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Qix; Foo', $fooBarQix->execute(73));
    }

    public function testInfQixFoo(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Inf; Qix; Foo', $fooBarQix->execute(504));
    }

    public function testInfQixFooOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Inf; Qix; Foo', $fooBarQix->execute(8731));
    }

    public function testMultipleAndOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Inf; Qix; Inf', $fooBarQix->execute(728));
    }

    public function testNoTransformation(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('1', $fooBarQix->execute(1));
        $this->assertEquals('19', $fooBarQix->execute(19));
        $this->assertEquals('22', $fooBarQix->execute(22));
    }
}
