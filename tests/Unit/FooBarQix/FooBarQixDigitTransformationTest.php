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

        $this->assertEquals('Foo', $transformationService->transformDigit(13)->getOutput());
        $this->assertEquals('FooFoo', $transformationService->transformDigit(33)->getOutput());
    }

    public function testAppendWordForDigit5()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Bar', $transformationService->transformDigit(50)->getOutput());
        $this->assertEquals('BarBar', $transformationService->transformDigit(55)->getOutput());
    }

    public function testAppendWordForDigit7()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Qix', $transformationService->transformDigit(17)->getOutput());
        $this->assertEquals('QixQix', $transformationService->transformDigit(77)->getOutput());

    }

    public function testAppendMultipleWordsForMultipleDigits()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('FooBarQix', $transformationService->transformDigit(357)->getOutput());
        $this->assertEquals('BarFooQixBar', $transformationService->transformDigit(5375)->getOutput());
        $this->assertEquals('QixFooBar', $transformationService->transformDigit(735)->getOutput());
        $this->assertEquals('BarQixFooBarBarQixQix', $transformationService->transformDigit(5735577)->getOutput());
    }
}