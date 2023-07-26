<?php

use App\Services\NumberTransformationService;

class InfQixFooNumberTransformationTest extends TestCase
{
    public function testMultiplesOf8()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Inf', $transformationService->getTransformedNumber(8)->getOutput());
    }

    public function testMultiplesOf7()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Qix', $transformationService->getTransformedNumber(7)->getOutput());
    }

    public function testMultiplesOf3()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo', $transformationService->getTransformedNumber(3)->getOutput());
    }

    public function testMultiplesOf8And7()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Inf;Qix', $transformationService->getTransformedNumber(56)->getOutput());
    }

    public function testMultiplesOf8And3()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Qix;Foo', $transformationService->getTransformedNumber(24)->getOutput());
    }

    public function testNoTransformation()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('1', $transformationService->getTransformedNumber(1)->getOutput());
        $this->assertIsString($transformationService->getTransformedNumber(1)->getOutput());
        $this->assertEquals('1234567', $transformationService->getTransformedNumber(1234567)->getOutput());
        $this->assertIsString($transformationService->getTransformedNumber(1234567)->getOutput());
    }
}