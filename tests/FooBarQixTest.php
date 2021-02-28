<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{
    public function testIsNumber(): void
    {
        $object = new FooBarQix();

        $this->expectException(InvalidArgumentException::class);
        $object->run('5');
    }

    public function testIsInteger(): void
    {
        $object = new FooBarQix();

        $this->expectException(InvalidArgumentException::class);
        $object->run(1.1);
    }

    public function testIsPositive(): void
    {
        $object = new FooBarQix();

        $this->expectException(InvalidArgumentException::class);
        $object->run(-3);
    }

    public function testFooOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Foo", $object->run(3));
    }

    public function testBarOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Bar", $object->run(55));
    }

    public function testQixOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Qix", $object->run(14));
    }

    public function testFooBarOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Foo, Bar", $object->run(30));
    }

    public function testFooQixOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Foo, Qix", $object->run(21));
    }

    public function testBarQixOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Bar, Qix", $object->run(35));
    }

    public function testFooBarQixOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Foo, Bar, Qix", $object->run(105));
    }



    public function testOtherOutput(): void
    {
        $object = new FooBarQix();

        $this->assertIsString($object->run(7));
    }

}