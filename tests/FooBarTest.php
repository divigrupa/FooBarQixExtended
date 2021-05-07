<?php

namespace Tests;

use App\Model\Num;

use App\Service\EqualService;
use App\Service\IsServices\IsBar;
use App\Service\IsServices\IsFoo;
use App\Service\IsServices\IsInf;
use App\Service\IsServices\IsQix;
use App\Service\MultipleEqualService;
use App\Service\MultipleService;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testFoo(): void
    {
        $numModel = new Num();
        $numModel->setNumber(3);
        $number = $numModel->getNumber();


        $testIsFoo = new IsFoo($number);
        $this->assertEquals('Foo', $testIsFoo->isMultiple());
        $this->assertEquals('Foo', $testIsFoo->isEqual());

        $testNotFoo = new IsFoo(8);
        $this->assertEquals(null, $testNotFoo->isMultiple());
        $this->assertEquals(null, $testNotFoo->isEqual());

        $testStringToInt = new IsFoo('3');
        $this->assertEquals('Foo', $testStringToInt->isMultiple());
        $this->assertEquals('Foo', $testStringToInt->isEqual());

        $testPositive = new IsFoo(-3);
        $this->assertEquals(null, $testPositive->isMultiple());
        $this->assertEquals(null, $testPositive->isEqual());

    }

    public function testBar(): void
    {
        $numModel = new Num();
        $numModel->setNumber(5);
        $number = $numModel->getNumber();

        $testIsBar = new IsBar($number);
        $this->assertEquals('Bar', $testIsBar->isMultiple());
        $this->assertEquals('Bar', $testIsBar->isEqual());

        $testNotBar = new IsBar(9);
        $this->assertEquals(null, $testNotBar->isMultiple());
        $this->assertEquals(null, $testNotBar->isEqual());

        $testStringToInt = new IsBar('5');
        $this->assertEquals('Bar', $testStringToInt->isMultiple());
        $this->assertEquals('Bar', $testStringToInt->isEqual());

        $testPositive = new IsBar(-5);
        $this->assertEquals(null, $testPositive->isMultiple());
        $this->assertEquals(null, $testPositive->isEqual());

    }

    public function testQix(): void
    {
        $numModel = new Num();
        $numModel->setNumber(7);
        $number = $numModel->getNumber();

        $testIsQix = new IsQix($number);
        $this->assertEquals('Qix', $testIsQix->isMultiple());
        $this->assertEquals('Qix', $testIsQix->isEqual());

        $testNotQix = new IsQix(13);
        $this->assertEquals(null, $testNotQix->isMultiple());
        $this->assertEquals(null, $testNotQix->isEqual());

        $testStringToInt = new IsQix('7');
        $this->assertEquals('Qix', $testStringToInt->isMultiple());
        $this->assertEquals('Qix', $testStringToInt->isEqual());

        $testPositive = new IsQix(-7);
        $this->assertEquals(null, $testPositive->isMultiple());
        $this->assertEquals(null, $testPositive->isEqual());

    }

    public function testInf(): void
    {
        $numModel = new Num();
        $numModel->setNumber(8);
        $number = $numModel->getNumber();

        $testIsInf = new IsInf($number);
        $this->assertEquals('Inf', $testIsInf->isMultiple());
        $this->assertEquals('Inf', $testIsInf->isEqual());

        $testNotInf = new IsInf(13);
        $this->assertEquals(null, $testNotInf->isMultiple());
        $this->assertEquals(null, $testNotInf->isEqual());

        $testStringToInt = new IsInf('8');
        $this->assertEquals('Inf', $testStringToInt->isMultiple());
        $this->assertEquals('Inf', $testStringToInt->isEqual());

        $testPositive = new IsInf(-7);
        $this->assertEquals(null, $testPositive->isMultiple());
        $this->assertEquals(null, $testPositive->isEqual());

    }

    public function testMultipleService()
    {
        $multipleService = new MultipleService();
        $this->assertEquals('Foo', $multipleService->isMultiple(9));
        $this->assertEquals('FooBar', $multipleService->isMultiple(15));
        $this->assertEquals('FooBarQix', $multipleService->isMultiple(420));
        $this->assertEquals('398', $multipleService->isMultiple(398));
        $this->assertEquals('1', $multipleService->isMultiple(1));
    }

    public function testEqualService()
    {
        $equalService = new EqualService();
        $this->assertEquals('3: Foo', $equalService->isEqual(3));
        $this->assertEquals('5: Bar', $equalService->isEqual(5));
        $this->assertEquals('7: Qix', $equalService->isEqual(7));
        $this->assertEquals('537: BarFooQix', $equalService->isEqual(537));
        $this->assertEquals('1: ', $equalService->isEqual(1));
    }

    public function testMultipleEqualService()
    {
        $multipleEqualService = new MultipleEqualService();
        $this->assertEquals('Foo', $multipleEqualService->isMultipleEqual(3));
        $this->assertEquals('17: QixInf', $multipleEqualService->isMultipleEqual(17));
        $this->assertEquals('Foo;Qix', $multipleEqualService->isMultipleEqual(21));
        $this->assertEquals('142: ', $multipleEqualService->isMultipleEqual(142));
        $this->assertEquals('1: ', $multipleEqualService->isMultipleEqual(1));
    }

}