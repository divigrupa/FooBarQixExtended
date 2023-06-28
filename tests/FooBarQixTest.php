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

    public function testFooBar(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('Foo, Bar', $fooBarQix->execute(15));
        $this->assertEquals('Foo, Bar', $fooBarQix->execute(30));
        $this->assertEquals('Foo, Bar', $fooBarQix->execute(45));
    }

    public function testNoTransformation(): void
    {
        $fooBarQix = new FooBarQix();
        $this->assertEquals('1', $fooBarQix->execute(1));
        $this->assertEquals('19', $fooBarQix->execute(19));
        $this->assertEquals('23', $fooBarQix->execute(23));
    }
}
