<?php

declare(strict_types=1);

namespace Divi\Test;

use \InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{
    public function testIsNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $object = new FooBarQix('5');
    }

    public function testIsInteger(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $object = new FooBarQix(1.1);
    }

    public function testIsPositive(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $object = new FooBarQix(-3);
    }

    public function testFooOutput(): void
    {
        $object = new FooBarQix(9);
        $this->assertEquals("Foo", $object->run());
    }

    public function testBarOutput(): void
    {
        $object = new FooBarQix(10);
        $this->assertEquals("Bar", $object->run());
    }

    public function testQixOutput(): void
    {
        $object = new FooBarQix(14);
        $this->assertEquals("Qix", $object->run());
    }

    public function testFooBarOutput(): void
    {
        $object = new FooBarQix(60);
        $this->assertEquals("Foo, Bar", $object->run());
    }

    public function testFooQixOutput(): void
    {
        $object = new FooBarQix(21);
        $this->assertEquals("Foo, Qix", $object->run());
    }

    public function testBarQixOutput(): void
    {
        $object = new FooBarQix(140);
        $this->assertEquals("Bar, Qix", $object->run());
    }

    public function testFooBarQixOutput(): void
    {
        $object = new FooBarQix(210);
        $this->assertEquals("Foo, Bar, Qix", $object->run());
    }


    public function testOtherOutput(): void
    {
        $object = new FooBarQix(1);
        $this->assertIsString($object->run());
        $this->assertEquals("1", $object->run());
    }



    public function testOccuranceOneOutput(): void
    {
        $object = new FooBarQix(131);
        $this->assertEquals("Foo", $object->run());

        $object = new FooBarQix(151);
        $this->assertEquals("Bar", $object->run());

        $object = new FooBarQix(1471);
        $this->assertEquals("Qix", $object->run());
    }

    public function testOccuranceTwoOutput(): void
    {
        $object = new FooBarQix(6352);
        $this->assertEquals("FooBar", $object->run());

        $object = new FooBarQix(5632);
        $this->assertEquals("BarFoo", $object->run());

        $object = new FooBarQix(2327);
        $this->assertEquals("FooQix", $object->run());
    }

    public function testOccuranceThreeOutput(): void
    {
        $object = new FooBarQix(325172);
        $this->assertEquals("FooBarQix", $object->run());

        $object = new FooBarQix(523172);
        $this->assertEquals("BarFooQix", $object->run());
    }


    public function testMultiplesAndOccurancesOutput(): void
    {
        $object = new FooBarQix(5630);
        $this->assertEquals("BarBarFoo", $object->run());

        $object = new FooBarQix(131);
        $this->assertEquals("Foo", $object->run());

        $object = new FooBarQix(150);
        $this->assertEquals("Foo, BarBar", $object->run());

        $object = new FooBarQix(147);
        $this->assertEquals("Foo, QixQix", $object->run());

        $object = new FooBarQix(6305);
        $this->assertEquals("BarFooBar", $object->run());

        $object = new FooBarQix(2317);
        $this->assertEquals("QixFooQix", $object->run());

        $object = new FooBarQix(325170);
        $this->assertEquals("Foo, BarFooBarQix", $object->run());
    }

}