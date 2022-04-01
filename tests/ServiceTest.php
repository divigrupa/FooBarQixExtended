<?php
namespace Tests;

use App\Service;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    /**
     * STEP 1: CHECKING MULTIPLES OF 3 (FOO) AND 5 (BAR)
    */
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
        $this->assertSame('FooBar', $stepOne->checkIfMultiple(15));
        $this->assertSame('FooBar', $stepOne->checkIfMultiple(90));
        $this->assertSame('FooBar', $stepOne->checkIfMultiple(285));
        $this->assertSame('FooBar', $stepOne->checkIfMultiple(2565));
    }

    public function testMultipleShouldReturnNumber()
    {
        $stepOne = new Service();
        $this->assertSame('4', $stepOne->checkIfMultiple(4));
        $this->assertSame('8', $stepOne->checkIfMultiple(8));
        $this->assertSame('22', $stepOne->checkIfMultiple(22));
    }

    /**
     * STEP 2: CHECKING MULTIPLES OF ADDITIONAL 7 (QIX)
     */
    public function testMultipleOfSevenShouldReturnQix()
    {
        $stepTwo = new Service();
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(7));
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(14));
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(77));
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(539));
    }

    public function testMultipleOfThreeAndSevenShouldReturnFooQix()
    {
        $stepTwo = new Service();
        $this->assertSame('FooQix', $stepTwo->checkIfMultiple(21));
        $this->assertSame('FooQix', $stepTwo->checkIfMultiple(147));
        $this->assertSame('FooQix', $stepTwo->checkIfMultiple(441));
        $this->assertSame('FooQix', $stepTwo->checkIfMultiple(21609));
    }

    public function testMultipleOfFiveAndSevenShouldReturnBarQix()
    {
        $stepTwo = new Service();
        $this->assertSame('BarQix', $stepTwo->checkIfMultiple(35));
        $this->assertSame('BarQix', $stepTwo->checkIfMultiple(245));
        $this->assertSame('BarQix', $stepTwo->checkIfMultiple(1225));
        $this->assertSame('BarQix', $stepTwo->checkIfMultiple(60025));
    }

    public function testMultipleOfThreeFiveAndSevenShouldReturnFooBarQix()
    {
        $stepTwo = new Service();
        $this->assertSame('FooBarQix', $stepTwo->checkIfMultiple(105));
        $this->assertSame('FooBarQix', $stepTwo->checkIfMultiple(525));
        $this->assertSame('FooBarQix', $stepTwo->checkIfMultiple(1575));
        $this->assertSame('FooBarQix', $stepTwo->checkIfMultiple(11025));
    }

    /**
     * STEP 3: APPENDING FOO, BAR OR QIX TO NUMBERS CONTAINING 3, 5 AND 7 RESPECTIVELY
    */
    /**
     * A: NUMBERS CONTAINING 3, 5, AND/OR 7
    */
    public function testNumberWithThreeShouldReturnFoo()
    {
        $stepThreeA = new Service();
        $this->assertSame('Foo', $stepThreeA->checkIfContainsMultiple(13));
        $this->assertSame('FooFoo', $stepThreeA->checkIfContainsMultiple(33));
        $this->assertSame('FooFooFoo', $stepThreeA->checkIfContainsMultiple(343883));
    }
    public function testNumberWithFiveShouldReturnBar()
    {
        $stepThreeA = new Service();
        $this->assertSame('Bar', $stepThreeA->checkIfContainsMultiple(15));
        $this->assertSame('BarBar', $stepThreeA->checkIfContainsMultiple(55));
        $this->assertSame('BarBarBar', $stepThreeA->checkIfContainsMultiple(51565));
    }
    public function testNumberWithSevenShouldReturnQix()
    {
        $stepThreeA = new Service();
        $this->assertSame('Qix', $stepThreeA->checkIfContainsMultiple(17));
        $this->assertSame('QixQix', $stepThreeA->checkIfContainsMultiple(77));
        $this->assertSame('QixQixQix', $stepThreeA->checkIfContainsMultiple(7877));
    }
    public function testNumberWithThreeAndFiveShouldReturnFooBar()
    {
        $stepThreeA = new Service();
        $this->assertSame('FooBar', $stepThreeA->checkIfContainsMultiple(35));
        $this->assertSame('BarFoo', $stepThreeA->checkIfContainsMultiple(5036));
        $this->assertSame('BarFooBar', $stepThreeA->checkIfContainsMultiple(583445));
        $this->assertSame('BarFooFoo', $stepThreeA->checkIfContainsMultiple(522303));
    }
    public function testNumberWithThreeAndSevenShouldReturnFooQix()
    {
        $stepThreeA = new Service();
        $this->assertSame('FooQix', $stepThreeA->checkIfContainsMultiple(37));
        $this->assertSame('QixFoo', $stepThreeA->checkIfContainsMultiple(7003));
        $this->assertSame('QixFooQix', $stepThreeA->checkIfContainsMultiple(703007));
        $this->assertSame('QixFooFoo', $stepThreeA->checkIfContainsMultiple(713366));
    }
    public function testNumberWithFiveAndSevenShouldReturnBarQix()
    {
        $stepThreeA = new Service();
        $this->assertSame('BarQix', $stepThreeA->checkIfContainsMultiple(57));
        $this->assertSame('QixBar', $stepThreeA->checkIfContainsMultiple(7005));
        $this->assertSame('QixBarQix', $stepThreeA->checkIfContainsMultiple(705070));
        $this->assertSame('QixBarBar', $stepThreeA->checkIfContainsMultiple(705111115));
    }
    public function testNumberWithThreeFiveAndSevenShouldReturnFooBarQix()
    {
        $stepThreeA = new Service();
        $this->assertSame('FooBarQix', $stepThreeA->checkIfContainsMultiple(357));
        $this->assertSame('FooQixBar', $stepThreeA->checkIfContainsMultiple(37005));
        $this->assertSame('FooQixBarFooQix', $stepThreeA->checkIfContainsMultiple(370053117));
        $this->assertSame('BarFooQix', $stepThreeA->checkIfContainsMultiple(5311700));
        $this->assertSame('BarQixFoo', $stepThreeA->checkIfContainsMultiple(5117003));
        $this->assertSame('BarQixFooFooQix', $stepThreeA->checkIfContainsMultiple(3111703307));
        $this->assertSame('QixFooBar', $stepThreeA->checkIfContainsMultiple(7035));
        $this->assertSame('QixBarFoo', $stepThreeA->checkIfContainsMultiple(70511113));
        $this->assertSame('QixBarFooFooQixBar', $stepThreeA->checkIfContainsMultiple(705311131715));
    }
}
