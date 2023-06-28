<?php declare(strict_types=1);

use App\FooBarQix;

class FooBarQixTest extends PHPUnit\Framework\TestCase
{
    public function testFoo(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo', $fooBarQix->execute(3));
        $this->assertEquals('Foo', $fooBarQix->execute(6));
        $this->assertEquals('Foo', $fooBarQix->execute(9));
    }

    public function testBar(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Bar', $fooBarQix->execute(5));
        $this->assertEquals('Bar', $fooBarQix->execute(10));
        $this->assertEquals('Bar', $fooBarQix->execute(20));
    }

    public function testQix(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Qix', $fooBarQix->execute(7));
        $this->assertEquals('Qix', $fooBarQix->execute(14));
        $this->assertEquals('Qix', $fooBarQix->execute(28));
    }

    public function testFooBar(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo, Bar', $fooBarQix->execute(15));
        $this->assertEquals('Foo, Bar', $fooBarQix->execute(30));
        $this->assertEquals('Foo, Bar', $fooBarQix->execute(45));
    }

    public function testFooQix(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo, Qix', $fooBarQix->execute(21));
        $this->assertEquals('Foo, Qix', $fooBarQix->execute(42));
        $this->assertEquals('Foo, Qix', $fooBarQix->execute(63));
    }

    public function testBarQix(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Bar, Qix', $fooBarQix->execute(35));
        $this->assertEquals('Bar, Qix', $fooBarQix->execute(70));
        $this->assertEquals('Bar, Qix', $fooBarQix->execute(140));
    }

    public function testFooBarQix(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo, Bar, Qix', $fooBarQix->execute(105));
        $this->assertEquals('Foo, Bar, Qix', $fooBarQix->execute(210));
        $this->assertEquals('Foo, Bar, Qix', $fooBarQix->execute(315));
    }

    public function testNoTransformation(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('1', $fooBarQix->execute(1));
        $this->assertEquals('19', $fooBarQix->execute(19));
        $this->assertEquals('23', $fooBarQix->execute(23));
    }
}
