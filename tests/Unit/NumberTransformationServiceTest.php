<?php

use App\Services\FooBarTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class NumberTransformationServiceTest extends TestCase
{
    public function testMultiplesOnly()
    {
        $transformer = new FooBarTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Foo', $transformationService->transformNumber(3)->getOutput());
        $this->assertEquals('Bar', $transformationService->transformNumber(5)->getOutput());
        $this->assertEquals('Foo,Bar', $transformationService->transformNumber(15)->getOutput());
    }

    public function testNoTransformation()
    {
        $transformer = new FooBarTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('7', $transformationService->transformNumber(7)->getOutput());
        $this->assertIsString($transformationService->transformNumber(7)->getOutput());
        $this->assertEquals('14', $transformationService->transformNumber(14)->getOutput());
        $this->assertIsString($transformationService->transformNumber(14)->getOutput());
    }
}