<?php


use App\Services\FooBarQixTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;
class FooBarQixDigitTransformationTest extends TestCase
{
    public function testAppendWordForDigit3()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo', $transformationService->getTransformedDigits(13)->getOutput());
        $this->assertEquals('FooFoo', $transformationService->getTransformedDigits(33)->getOutput());
    }

    public function testAppendWordForDigit5()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Bar', $transformationService->getTransformedDigits(50)->getOutput());
        $this->assertEquals('BarBar', $transformationService->getTransformedDigits(55)->getOutput());
    }

    public function testAppendWordForDigit7()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Qix', $transformationService->getTransformedDigits(17)->getOutput());
        $this->assertEquals('QixQix', $transformationService->getTransformedDigits(77)->getOutput());
    }

    public function testAppendMultipleWordsForMultipleDigits()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('FooBarQix', $transformationService->getTransformedDigits(357)->getOutput());
        $this->assertEquals('BarFooQixBar', $transformationService->getTransformedDigits(5375)->getOutput());
        $this->assertEquals('QixFooBar', $transformationService->getTransformedDigits(735)->getOutput());
        $this->assertEquals('BarQixFooBarBarQixQix', $transformationService->getTransformedDigits(5735577)->getOutput());
    }
    public function testNoTransformation()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('', $transformationService->getTransformedDigits(1)->getOutput());
    }
}