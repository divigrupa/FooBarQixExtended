<?php

use \Codeception\Test\Unit;
use \InfQixFoo\InfQixFoo;

// @codingStandardsIgnoreLine
class InfQixFooTest extends Unit
{
    private $fooBar = null;

    // @codingStandardsIgnoreLine
    protected function _before()
    {
        $this->fooBar = new InfQixFoo;
    }

    public function testCheckFirstFifteenNumbersStatically()
    {
        $exceptResults = [
            '',
            '1',
            '2',
            'Foo',
            '4',
            '5',
            'Foo',
            'Qix',
            'Inf',
            'Foo',
            '10',
            '11',
            'Foo',
            '13',
            'Qix',
            'Foo'
        ];

        for ($i = 1; $i <= 15; $i++) {
            $this->assertEquals($exceptResults[$i], $this->fooBar->showMultiples($i));
        }
    }

    public function testCheckNegativeInteger()
    {
        $this->expectException(Exception::class);
        $this->fooBar->showMultiples(-1);
    }

    public function testCheckNegativeIntegerInOccurrences()
    {
        $this->expectException(Exception::class);
        $this->fooBar->showOccurrences(-1);
    }

    public function testCheckIfLetterNotInteger()
    {
        $this->expectException(Exception::class);
        $this->fooBar->showMultiples('a');
    }

    public function testCheckInOccurrencesIfLetterNotInteger()
    {
        $this->expectException(Exception::class);
        $this->fooBar->showOccurrences('a');
    }

    public function testCheckIfThreeReturnFoo()
    {
        $this->assertEquals('Foo', $this->fooBar->showMultiples(3));
    }

    public function testCheckIfFiveReturnBar()
    {
        $this->assertEquals('5', $this->fooBar->showMultiples(5));
    }

    public function testCheckIfSevenReturnQix()
    {
        $this->assertEquals('Qix', $this->fooBar->showMultiples(7));
    }

    public function testCheckIfMultipleWithThreeAndFiveReturFoobar()
    {
        $this->assertEquals('Foo', $this->fooBar->showMultiples(3 * 5));
    }

    public function testCheckIfMultipleWithFiveAndSevenReturqix()
    {
        $this->assertEquals('Qix', $this->fooBar->showMultiples(5 * 7));
    }

    public function testCheckIfMultipleWithThreeFiveAndSevenReturnFoobarqix()
    {
        $this->assertEquals('Qix; Foo', $this->fooBar->showMultiples(3 * 5 * 7));
    }
    
    public function testCheckIfOneReturnString()
    {
        $this->assertEquals('string', gettype($this->fooBar->showMultiples(1)));
    }
    
    public function testOccurrencesWithExludedFromRules()
    {
        $numbers = [
            1, 2, 4, 6, 9, 10, 11, 111, 999
        ];

        foreach ($numbers as $number) {
            $this->assertEquals($number, $this->fooBar->showOccurrences($number));
        }
    }

    public function testOccurrencesIfThreeReplacedWithFoo()
    {
        $this->assertEquals('Foo', $this->fooBar->showOccurrences(3));
    }

    public function testOccurrencesIfFiveReplacedWithString()
    {
        $this->assertEquals('5', $this->fooBar->showOccurrences(5));
    }

    public function testOccurrencesIfSevenReplacedWithQix()
    {
        $this->assertEquals('Qix', $this->fooBar->showOccurrences(7));
    }

    public function testOccurrencesIfEightReplacedWithInf()
    {
        $this->assertEquals('InfInf', $this->fooBar->showOccurrences(8));
    }

    public function testOccurrencesIfPlainCombinationsReturnCorrectly()
    {
        $this->assertEquals('Foo; Qix', $this->fooBar->showOccurrences(357));
        $this->assertEquals('FooInf', $this->fooBar->showOccurrences(35));
        $this->assertEquals('Foo; Qix', $this->fooBar->showOccurrences(37));
        $this->assertEquals('Qix', $this->fooBar->showOccurrences(57));

        $this->assertEquals('Qix; Foo', $this->fooBar->showOccurrences(753));
        $this->assertEquals('Qix', $this->fooBar->showOccurrences(75));
        $this->assertEquals('Qix; Foo', $this->fooBar->showOccurrences(73));
        $this->assertEquals('FooInf', $this->fooBar->showOccurrences(53));

        $this->assertEquals('Foo; Qix', $this->fooBar->showOccurrences(375));
    }

    public function testOccurrencesIfMixedCombinationsReturnCorrectly()
    {
        $this->assertEquals('Foo; QixInf', $this->fooBar->showOccurrences(1357));
        $this->assertEquals('Foo; Qix', $this->fooBar->showOccurrences(132547999));
        $this->assertEquals('Foo', $this->fooBar->showOccurrences(235));
        $this->assertEquals('Foo; Qix', $this->fooBar->showOccurrences(437));
        $this->assertEquals('Qix', $this->fooBar->showOccurrences(657));
    }

    public function testOccurrencesIfSameNumberRowsReturnCorrectly()
    {
        $this->assertEquals('Foo; Foo; Foo', $this->fooBar->showOccurrences(333));
        $this->assertEquals('Inf; Inf; InfInf', $this->fooBar->showOccurrences(888));
        $this->assertEquals('Qix; Qix; Qix', $this->fooBar->showOccurrences(777));
    }
}
