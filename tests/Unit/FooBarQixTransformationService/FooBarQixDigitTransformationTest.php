<?php

use App\Services\FooBarQixTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;
class FooBarQixDigitTransformationTest extends TestCase
{
    private NumberTransformationService $transformationService;
    protected function setUp(): void
    {
        $transformer = new FooBarQixTransformer();
        $this->transformationService = new NumberTransformationService($transformer);
    }

    public function testAppendWordForDigit3()
    {
        $this->assertEquals('Foo', $this->transformationService->getTransformedDigits(13)->getOutput());
        $this->assertEquals('FooFoo', $this->transformationService->getTransformedDigits(33)->getOutput());
    }

    public function testAppendWordForDigit5()
    {
        $this->assertEquals('Bar', $this->transformationService->getTransformedDigits(50)->getOutput());
        $this->assertEquals('BarBar', $this->transformationService->getTransformedDigits(55)->getOutput());
    }

    public function testAppendWordForDigit7()
    {
        $this->assertEquals('Qix', $this->transformationService->getTransformedDigits(17)->getOutput());
        $this->assertEquals('QixQix', $this->transformationService->getTransformedDigits(77)->getOutput());
    }

    public function testAppendMultipleWordsForMultipleDigits()
    {
        $this->assertEquals('FooBarQix', $this->transformationService->getTransformedDigits(357)->getOutput());
        $this->assertEquals('BarFooQixBar', $this->transformationService->getTransformedDigits(5375)->getOutput());
        $this->assertEquals('QixFooBar', $this->transformationService->getTransformedDigits(735)->getOutput());
        $this->assertEquals('BarQixFooBarBarQixQix', $this->transformationService->getTransformedDigits(5735577)->getOutput());
    }
    public function testNoTransformation()
    {
        $this->assertEquals('', $this->transformationService->getTransformedDigits(1)->getOutput());
    }
}