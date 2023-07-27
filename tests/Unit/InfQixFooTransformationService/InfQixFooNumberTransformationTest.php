<?php

use App\Services\InfQixFooTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class InfQixFooNumberTransformationTest extends TestCase
{
    private NumberTransformationService $transformationService;
    protected function setUp(): void
    {
        $transformer = new InfQixFooTransformer();
        $this->transformationService = new NumberTransformationService($transformer);
    }
    public function testMultiplesOf8()
    {
        $this->assertEquals('Inf', $this->transformationService->getTransformedNumber(8)->getOutput());
    }

    public function testMultiplesOf7()
    {
        $this->assertEquals('Qix', $this->transformationService->getTransformedNumber(7)->getOutput());
    }

    public function testMultiplesOf3()
    {
        $this->assertEquals('Foo', $this->transformationService->getTransformedNumber(3)->getOutput());
    }

    public function testMultiplesOf8And7()
    {
        $this->assertEquals('Inf;Qix', $this->transformationService->getTransformedNumber(56)->getOutput());
    }

    public function testMultiplesOf8And3()
    {
        $this->assertEquals('Inf;Foo', $this->transformationService->getTransformedNumber(24)->getOutput());
    }

    public function testNoTransformation()
    {
        $this->assertEquals('1', $this->transformationService->getTransformedNumber(1)->getOutput());
        $this->assertIsString($this->transformationService->getTransformedNumber(1)->getOutput());
        $this->assertEquals('1234567', $this->transformationService->getTransformedNumber(1234567)->getOutput());
        $this->assertIsString($this->transformationService->getTransformedNumber(1234567)->getOutput());
    }
}