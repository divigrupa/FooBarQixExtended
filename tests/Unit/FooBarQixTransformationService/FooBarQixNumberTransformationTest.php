<?php

use App\Services\FooBarQixTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class FooBarQixNumberTransformationTest extends TestCase
{
    public function testMultiplesOf3()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo', $transformationService->getTransformedNumber(3)->getOutput());
    }

    public function testMultiplesOf5()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Bar', $transformationService->getTransformedNumber(5)->getOutput());
    }

    public function testMultiplesOf7()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Qix', $transformationService->getTransformedNumber(7)->getOutput());
    }

    public function testMultiplesOf3And5()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo,Bar', $transformationService->getTransformedNumber(15)->getOutput());
    }

    public function testMultiplesOf3And5And7()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo,Bar,Qix', $transformationService->getTransformedNumber(105)->getOutput());
    }

    public function testNoTransformation()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('1', $transformationService->getTransformedNumber(1)->getOutput());
        $this->assertIsString($transformationService->getTransformedNumber(1)->getOutput());
        $this->assertEquals('1234567', $transformationService->getTransformedNumber(1234567)->getOutput());
        $this->assertIsString($transformationService->getTransformedNumber(1234567)->getOutput());
    }
}