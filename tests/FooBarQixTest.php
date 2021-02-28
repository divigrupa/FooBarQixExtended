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

        $this->assertEquals("Foo", $object->run(9));
    }

    public function testBarOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Bar", $object->run(10));
    }

    public function testQixOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Qix", $object->run(14));
    }

    public function testFooBarOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("FooBar", $object->run(60));
    }

    public function testFooQixOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("FooQix", $object->run(21));
    }

    public function testBarQixOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("BarQix", $object->run(140));
    }

    public function testFooBarQixOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("FooBarQix", $object->run(210));
    }


    public function testOtherOutput(): void
    {
        $object = new FooBarQix();

        $this->assertIsString($object->run(1));
        $this->assertEquals("1", $object->run(1));
    }



    public function testOccuranceOneOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("Foo", $object->run(131));
        $this->assertEquals("Bar", $object->run(151));
        $this->assertEquals("Qix", $object->run(1471));
    }

    public function testOccuranceTwoOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("FooBar", $object->run(6352));
        $this->assertEquals("BarFoo", $object->run(5632));
        $this->assertEquals("FooQix", $object->run(2327));
    }

    public function testOccuranceThreeOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("FooBarQix", $object->run(325172));
        $this->assertEquals("BarFooQix", $object->run(523172));
    }


    public function testMultiplesAndOccurancesOutput(): void
    {
        $object = new FooBarQix();

        $this->assertEquals("BarBarFoo", $object->run(5630));
        $this->assertEquals("Foo", $object->run(131));
        $this->assertEquals("FooBarBar", $object->run(150));
        $this->assertEquals("FooQixQix", $object->run(147));
        $this->assertEquals("BarFooBar", $object->run(6305));
        $this->assertEquals("QixFooQix", $object->run(2317));
        $this->assertEquals("FooBarFooBarQix", $object->run(325170));
    }

}