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
            $this->assertEquals($exceptResults[$i], $this->fooBar->run($i));
        }
    }

    public function testCheckNegativeInteger()
    {
        $this->expectException(Exception::class);
        $this->fooBar->run(-1);
    }

    public function testCheckNegativeIntegerInNewrules()
    {
        $this->expectException(Exception::class);
        $this->fooBar->newRules(-1);
    }

    public function testCheckIfLetterNotInteger()
    {
        $this->expectException(Exception::class);
        $this->fooBar->run('a');
    }

    public function testCheckInNewrulesIfLetterNotInteger()
    {
        $this->expectException(Exception::class);
        $this->fooBar->newRules('a');
    }

    public function testCheckIfThreeReturnFoo()
    {
        $this->assertEquals('Foo', $this->fooBar->run(3));
    }

    public function testCheckIfFiveReturnBar()
    {
        $this->assertEquals('5', $this->fooBar->run(5));
    }

    public function testCheckIfSevenReturnQix()
    {
        $this->assertEquals('Qix', $this->fooBar->run(7));
    }

    public function testCheckIfMultipleWithThreeAndFiveReturFoobar()
    {
        $this->assertEquals('Foo', $this->fooBar->run(3 * 5));
    }

    public function testCheckIfMultipleWithFiveAndSevenReturqix()
    {
        $this->assertEquals('Qix', $this->fooBar->run(5 * 7));
    }

    public function testCheckIfMultipleWithThreeFiveAndSevenReturnFoobarqix()
    {
        $this->assertEquals('Qix; Foo', $this->fooBar->run(3 * 5 * 7));
    }
    
    public function testCheckIfOneReturnString()
    {
        $this->assertEquals('string', gettype($this->fooBar->run(1)));
    }
    
    public function testNewRulesWithExludedFromRules()
    {
        $numbers = [
            1, 2, 4, 6, 9, 10, 11, 111, 999
        ];

        foreach ($numbers as $number) {
            $this->assertEquals($number, $this->fooBar->newRules($number));
        }
    }

    public function testNewRulesIfThreeReplacedWithFoo()
    {
        $this->assertEquals('Foo', $this->fooBar->newRules(3));
    }

    public function testNewRulesIfFiveReplacedWithString()
    {
        $this->assertEquals('5', $this->fooBar->newRules(5));
    }

    public function testNewRulesIfSevenReplacedWithQix()
    {
        $this->assertEquals('Qix', $this->fooBar->newRules(7));
    }

    public function testNewRulesIfEightReplacedWithInf()
    {
        $this->assertEquals('InfInf', $this->fooBar->newRules(8));
    }

    public function testNewRulesIfPlainCombinationsReturnCorrectly()
    {
        $this->assertEquals('Foo; Qix', $this->fooBar->newRules(357));
        $this->assertEquals('FooInf', $this->fooBar->newRules(35));
        $this->assertEquals('Foo; Qix', $this->fooBar->newRules(37));
        $this->assertEquals('Qix', $this->fooBar->newRules(57));

        $this->assertEquals('Qix; Foo', $this->fooBar->newRules(753));
        $this->assertEquals('Qix', $this->fooBar->newRules(75));
        $this->assertEquals('Qix; Foo', $this->fooBar->newRules(73));
        $this->assertEquals('FooInf', $this->fooBar->newRules(53));

        $this->assertEquals('Foo; Qix', $this->fooBar->newRules(375));
    }

    public function testNewRulesIfMixedCombinationsReturnCorrectly()
    {
        $this->assertEquals('Foo; QixInf', $this->fooBar->newRules(1357));
        $this->assertEquals('Foo; Qix', $this->fooBar->newRules(132547999));
        $this->assertEquals('Foo', $this->fooBar->newRules(235));
        $this->assertEquals('Foo; Qix', $this->fooBar->newRules(437));
        $this->assertEquals('Qix', $this->fooBar->newRules(657));
    }

    public function testNewRulesIfSameNumberRowsReturnCorrectly()
    {
        $this->assertEquals('Foo; Foo; Foo', $this->fooBar->newRules(333));
        $this->assertEquals('Inf; Inf; InfInf', $this->fooBar->newRules(888));
        $this->assertEquals('Qix; Qix; Qix', $this->fooBar->newRules(777));
    }
}
