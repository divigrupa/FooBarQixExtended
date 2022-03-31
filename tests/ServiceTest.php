<?php
namespace Tests;

use App\Service;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{

    public function testMultipleOfThreeShouldReturnFoo()
    {
        $stepOne = new Service();
        $this->assertSame('Foo', $stepOne->checkIfMultiple(3));
        $this->assertSame('Foo', $stepOne->checkIfMultiple(6));
        $this->assertSame('Foo', $stepOne->checkIfMultiple(99));
        $this->assertSame('Foo', $stepOne->checkIfMultiple(117));
    }

    public function testMultipleOfFiveShouldReturnBar()
    {
        $stepOne = new Service();
        $this->assertSame('Bar', $stepOne->checkIfMultiple(5));
        $this->assertSame('Bar', $stepOne->checkIfMultiple(10));
        $this->assertSame('Bar', $stepOne->checkIfMultiple(20));
        $this->assertSame('Bar', $stepOne->checkIfMultiple(185));
    }

    public function testMultipleOfThreeAndFiveShouldReturnFooBar()
    {
        $stepOne = new Service();
        $this->assertSame('Foo, Bar', $stepOne->checkIfMultiple(15));
        $this->assertSame('Foo, Bar', $stepOne->checkIfMultiple(90));
        $this->assertSame('Foo, Bar', $stepOne->checkIfMultiple(285));
        $this->assertSame('Foo, Bar', $stepOne->checkIfMultiple(2565));
    }

    public function testMultipleShouldReturnNumber()
    {
        $stepOne = new Service();
        $this->assertSame('4', $stepOne->checkIfMultiple(4));
        $this->assertSame('8', $stepOne->checkIfMultiple(8));
        $this->assertSame('22', $stepOne->checkIfMultiple(22));
    }

    public function testMultipleOfSevenShouldReturnQix()
    {
        $stepOne = new Service();
        $this->assertSame('Qix', $stepOne->checkIfMultiple(7));
        $this->assertSame('Qix', $stepOne->checkIfMultiple(14));
        $this->assertSame('Qix', $stepOne->checkIfMultiple(77));
        $this->assertSame('Qix', $stepOne->checkIfMultiple(539));
    }

    public function testMultipleOfThreeAndSevenShouldReturnFooQix()
    {
        $stepOne = new Service();
        $this->assertSame('Foo, Qix', $stepOne->checkIfMultiple(21));
        $this->assertSame('Foo, Qix', $stepOne->checkIfMultiple(147));
        $this->assertSame('Foo, Qix', $stepOne->checkIfMultiple(441));
        $this->assertSame('Foo, Qix', $stepOne->checkIfMultiple(21609));
    }

    public function testMultipleOfFiveAndSevenShouldReturnBarQix()
    {
        $stepOne = new Service();
        $this->assertSame('Bar, Qix', $stepOne->checkIfMultiple(35));
        $this->assertSame('Bar, Qix', $stepOne->checkIfMultiple(245));
        $this->assertSame('Bar, Qix', $stepOne->checkIfMultiple(1225));
        $this->assertSame('Bar, Qix', $stepOne->checkIfMultiple(60025));
    }

    public function testMultipleOfThreeFiveAndSevenShouldReturnFooBarQix()
    {
        $stepOne = new Service();
        $this->assertSame('Foo, Bar, Qix', $stepOne->checkIfMultiple(105));
        $this->assertSame('Foo, Bar, Qix', $stepOne->checkIfMultiple(525));
        $this->assertSame('Foo, Bar, Qix', $stepOne->checkIfMultiple(1575));
        $this->assertSame('Foo, Bar, Qix', $stepOne->checkIfMultiple(11025));
    }
}
