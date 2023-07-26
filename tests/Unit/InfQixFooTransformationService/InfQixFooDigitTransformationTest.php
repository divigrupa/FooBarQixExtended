<?php

use App\Services\InfQixFooTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class InfQixFooDigitTransformationTest extends TestCase
{
    public function testAppendWordForDigit8()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Inf', $transformationService->getTransformedDigits(18)->getOutput());
        $this->assertEquals('InfInf', $transformationService->getTransformedDigits(88)->getOutput());
    }

    public function testAppendWordForDigit7()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Qix', $transformationService->getTransformedDigits(70)->getOutput());
        $this->assertEquals('QixQix', $transformationService->getTransformedDigits(77)->getOutput());
    }

    public function testAppendWordForDigit3()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo', $transformationService->getTransformedDigits(13)->getOutput());
        $this->assertEquals('FooFoo', $transformationService->getTransformedDigits(33)->getOutput());
    }

    public function testAppendMultipleWordsForMultipleDigits()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('FooInfQix', $transformationService->getTransformedDigits(387)->getOutput());
        $this->assertEquals('InfFooQixInf', $transformationService->getTransformedDigits(8378)->getOutput());
        $this->assertEquals('QixFooInf', $transformationService->getTransformedDigits(738)->getOutput());
        $this->assertEquals('InfInfFooInfInfQixQix', $transformationService->getTransformedDigits(8838877)->getOutput());
    }
    public function testNoTransformation()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('', $transformationService->getTransformedDigits(1)->getOutput());
    }
}