<?php

use App\Services\FooBarTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class FooBarQixTransformationTest extends TestCase
{
    public function testMultiplesOf3()
    {
        $transformer = new FooBarTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo', $transformationService->transformNumber(3)->getOutput());
    }

    public function testMultiplesOf5()
    {
        $transformer = new FooBarTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Bar', $transformationService->transformNumber(5)->getOutput());
    }

    public function testMultiplesOf7()
    {
        $transformer = new FooBarTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Qix', $transformationService->transformNumber(7)->getOutput());
    }

    public function testMultiplesOf3And5()
    {
        $transformer = new FooBarTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo,Bar', $transformationService->transformNumber(15)->getOutput());
    }

    public function testMultiplesOf3And5And7()
    {
        $transformer = new FooBarTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo,Bar,Qix', $transformationService->transformNumber(105)->getOutput());
    }

    public function testNoTransformation()
    {
        $transformer = new FooBarTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('1', $transformationService->transformNumber(1)->getOutput());
        $this->assertIsString($transformationService->transformNumber(1)->getOutput());
        $this->assertEquals('1234567', $transformationService->transformNumber(1234567)->getOutput());
        $this->assertIsString($transformationService->transformNumber(1234567)->getOutput());
    }
}