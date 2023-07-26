<?php

use App\Services\InfQixFooTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class InfQixFullTransformationTest extends TestCase
{
    public function testMultiplesOf8andAppendsWords()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);
        $this->assertEquals('Inf;Foo', $transformationService->getFullTransformation(352)->getOutput());
    }
    public function testMultiplesOf7andAppendsWords()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);
        $this->assertEquals('Qix;Foo', $transformationService->getFullTransformation(420)->getOutput());
    }
    public function testMultiplesOf3andAppendsWords()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);
        $this->assertEquals('Foo;QixQix', $transformationService->getFullTransformation(177)->getOutput());
    }
    public function testNoTransformation()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);
        $this->assertEquals('1', $transformationService->getFullTransformation(1)->getOutput());
    }
}