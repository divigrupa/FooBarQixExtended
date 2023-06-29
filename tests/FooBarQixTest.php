<?php declare(strict_types=1);

use App\FooBarQix;

class FooBarQixTest extends PHPUnit\Framework\TestCase
{
    public function testFoo(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo', $fooBarQix->execute(12));
        $this->assertEquals('Foo', $fooBarQix->execute(6));
        $this->assertEquals('Foo', $fooBarQix->execute(9));
    }

    public function testFooOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo', $fooBarQix->execute(13));
    }

    public function testBar(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Bar', $fooBarQix->execute(40));
        $this->assertEquals('Bar', $fooBarQix->execute(10));
        $this->assertEquals('Bar', $fooBarQix->execute(20));
    }

    public function testBarOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Bar', $fooBarQix->execute(52));
    }

    public function testQix(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Qix', $fooBarQix->execute(49));
        $this->assertEquals('Qix', $fooBarQix->execute(14));
        $this->assertEquals('Qix', $fooBarQix->execute(28));
    }

    public function testQixOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Qix', $fooBarQix->execute(71));
    }

    public function testFooBar(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo, Bar', $fooBarQix->execute(60));
        $this->assertEquals('Foo, Bar', $fooBarQix->execute(120));
        $this->assertEquals('Foo, Bar', $fooBarQix->execute(90));
    }

    public function testBarFooOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Bar, Foo', $fooBarQix->execute(53));
    }

    public function testFooQix(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo, Qix', $fooBarQix->execute(21));
        $this->assertEquals('Foo, Qix', $fooBarQix->execute(42));
        $this->assertEquals('Foo, Qix', $fooBarQix->execute(84));
    }

    public function testFooQixOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo, Qix', $fooBarQix->execute(37));
    }

    public function testBarQix(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Bar, Qix', $fooBarQix->execute(280));
        $this->assertEquals('Bar, Qix', $fooBarQix->execute(350));
        $this->assertEquals('Bar, Qix', $fooBarQix->execute(140));
    }

    public function testBarQixOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Bar, Qix', $fooBarQix->execute(57));
    }

    public function testFooBarQix(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo, Bar, Qix', $fooBarQix->execute(420));
        $this->assertEquals('Foo, Bar, Qix', $fooBarQix->execute(210));
        $this->assertEquals('Foo, Bar, Qix', $fooBarQix->execute(840));
    }

    public function testFooBarQixOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo, Bar, Qix', $fooBarQix->execute(357));
    }

    public function testMultipleAndOccurrence(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Bar, Foo, Bar', $fooBarQix->execute(35));
        $this->assertEquals('Foo, Bar, Qiz, Bar', $fooBarQix->execute(75));
        $this->assertEquals('Foo, Bar, Qix, Bar', $fooBarQix->execute(45));
    }

    public function testNoTransformation(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('1', $fooBarQix->execute(1));
        $this->assertEquals('19', $fooBarQix->execute(19));
        $this->assertEquals('22', $fooBarQix->execute(22));
    }
}
