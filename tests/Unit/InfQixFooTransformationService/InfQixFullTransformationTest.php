<?php

use App\Services\InfQixFooTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class InfQixFullTransformationTest extends TestCase
{
    private NumberTransformationService $transformationService;
    protected function setUp(): void
    {
        $transformer = new InfQixFooTransformer();
        $this->transformationService = new NumberTransformationService($transformer);
    }
    public function testMultiplesOf8andAppendsWords()
    {
        $this->assertEquals('Inf;Foo', $this->transformationService->getFullTransformation(352)->getOutput());
    }
    public function testMultiplesOf7andAppendsWords()
    {
        $this->assertEquals('Qix;Foo', $this->transformationService->getFullTransformation(420)->getOutput());
    }
    public function testMultiplesOf3andAppendsWords()
    {
        $this->assertEquals('Foo;QixQix', $this->transformationService->getFullTransformation(177)->getOutput());
    }
    public function testNoTransformation()
    {
        $this->assertEquals('1', $this->transformationService->getFullTransformation(1)->getOutput());
    }
}