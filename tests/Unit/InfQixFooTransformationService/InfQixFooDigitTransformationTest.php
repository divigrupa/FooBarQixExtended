<?php

use App\Services\InfQixFooTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class InfQixFooDigitTransformationTest extends TestCase
{
    private NumberTransformationService $transformationService;
    protected function setUp(): void
    {
        $transformer = new InfQixFooTransformer();
        $this->transformationService = new NumberTransformationService($transformer);
    }
    public function testAppendWordForDigit8()
    {
        $this->assertEquals('Inf', $this->transformationService->getTransformedDigits(18)->getOutput());
        $this->assertEquals('InfInf', $this->transformationService->getTransformedDigits(88)->getOutput());
    }

    public function testAppendWordForDigit7()
    {
        $this->assertEquals('Qix', $this->transformationService->getTransformedDigits(70)->getOutput());
        $this->assertEquals('QixQix', $this->transformationService->getTransformedDigits(77)->getOutput());
    }

    public function testAppendWordForDigit3()
    {
        $this->assertEquals('Foo', $this->transformationService->getTransformedDigits(13)->getOutput());
        $this->assertEquals('FooFoo', $this->transformationService->getTransformedDigits(33)->getOutput());
    }

    public function testAppendMultipleWordsForMultipleDigits()
    {
        $this->assertEquals('FooInfQix', $this->transformationService->getTransformedDigits(387)->getOutput());
        $this->assertEquals('InfFooQixInf', $this->transformationService->getTransformedDigits(8378)->getOutput());
        $this->assertEquals('QixFooInf', $this->transformationService->getTransformedDigits(738)->getOutput());
        $this->assertEquals('InfInfFooInfInfQixQix', $this->transformationService->getTransformedDigits(8838877)->getOutput());
    }
    public function testNoTransformation()
    {
        $this->assertEquals('', $this->transformationService->getTransformedDigits(1)->getOutput());
    }
}