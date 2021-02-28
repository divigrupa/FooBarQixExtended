<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testIsNumber(): void
    {
        $object = new FooBar();

        $this->expectException(InvalidArgumentException::class);
        $object->run('5');
    }

    public function testIsInteger(): void
    {
        $object = new FooBar();

        $this->expectException(InvalidArgumentException::class);
        $object->run(1.1);
    }

    public function testIsPositive(): void
    {
        $object = new FooBar();

        $this->expectException(InvalidArgumentException::class);
        $object->run(-3);
    }

    public function testFooOutput(): void
    {
        $object = new FooBar();

        $this->assertEquals("Foo", $object->run(3));
    }

    public function testBarOutput(): void
    {
        $object = new FooBar();

        $this->assertEquals("Bar", $object->run(55));
    }

    public function testQixOutput(): void
    {
        $object = new FooBar();

        $this->assertEquals("Qix", $object->run(14));
    }

    public function testFooBarOutput(): void
    {
        $object = new FooBar();

        $this->assertEquals("FooBar", $object->run(30));
    }

    public function testFooQixOutput(): void
    {
        $object = new FooBar();

        $this->assertEquals("FooQix", $object->run(21));
    }

    public function testBarQixOutput(): void
    {
        $object = new FooBar();

        $this->assertEquals("BarQix", $object->run(35));
    }

    public function testFooBarQixOutput(): void
    {
        $object = new FooBar();

        $this->assertEquals("FooBarQix", $object->run(105));
    }



    public function testOtherOutput(): void
    {
        $object = new FooBar();

        $this->assertIsString($object->run(7));
    }

}