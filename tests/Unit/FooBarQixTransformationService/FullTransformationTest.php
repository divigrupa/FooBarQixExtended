<?php

use App\Services\FooBarQixTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class FullTransformationTest extends TestCase
{
    private NumberTransformationService $transformationService;
    protected function setUp(): void
    {
        $transformer = new FooBarQixTransformer();
        $this->transformationService = new NumberTransformationService($transformer);
    }
    public function testMultiplesOf3andAppendsWords()
    {
        $this->assertEquals('Foo,Qix,FooBarQix', $this->transformationService->getFullTransformation(357)->getOutput());
    }
    public function testMultiplesOf5andAppendsWords()
    {
        $this->assertEquals('Bar,FooBarBar', $this->transformationService->getFullTransformation(355)->getOutput());
    }
    public function testMultiplesOf7andAppendsWords()
    {
        $this->assertEquals('Bar,Qix,FooBar', $this->transformationService->getFullTransformation(350)->getOutput());
    }
    public function testNoTransformation()
    {
        $this->assertEquals('1', $this->transformationService->getFullTransformation(1)->getOutput());
    }
}