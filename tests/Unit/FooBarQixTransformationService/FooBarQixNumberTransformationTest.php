<?php

use App\Services\FooBarQixTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class FooBarQixNumberTransformationTest extends TestCase
{
    private NumberTransformationService $transformationService;
    protected function setUp(): void
    {
        $transformer = new FooBarQixTransformer();
        $this->transformationService = new NumberTransformationService($transformer);
    }
    public function testMultiplesOf3()
    {
        $this->assertEquals('Foo', $this->transformationService->getTransformedNumber(3)->getOutput());
    }

    public function testMultiplesOf5()
    {
        $this->assertEquals('Bar', $this->transformationService->getTransformedNumber(5)->getOutput());
    }

    public function testMultiplesOf7()
    {
        $this->assertEquals('Qix', $this->transformationService->getTransformedNumber(7)->getOutput());
    }

    public function testMultiplesOf3And5()
    {
        $this->assertEquals('Foo,Bar', $this->transformationService->getTransformedNumber(15)->getOutput());
    }

    public function testMultiplesOf3And5And7()
    {
        $this->assertEquals('Foo,Bar,Qix', $this->transformationService->getTransformedNumber(105)->getOutput());
    }

    public function testNoTransformation()
    {
        $this->assertEquals('1', $this->transformationService->getTransformedNumber(1)->getOutput());
        $this->assertIsString($this->transformationService->getTransformedNumber(1)->getOutput());
        $this->assertEquals('1234567', $this->transformationService->getTransformedNumber(1234567)->getOutput());
        $this->assertIsString($this->transformationService->getTransformedNumber(1234567)->getOutput());
    }
}