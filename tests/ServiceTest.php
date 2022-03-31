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
        $this->assertSame('777', $stepOne->checkIfMultiple(773));
    }
}
