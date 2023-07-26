<?php

use App\Services\FooBarQixTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class FullTransformationTest extends TestCase
{
    public function testMultiplesOf3andAppendsWords()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);
        $this->assertEquals('Foo,Qix,FooBarQix', $transformationService->getFullTransformation(357)->getOutput());
    }
    public function testMultiplesOf5andAppendsWords()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);
        $this->assertEquals('Bar,FooBarBar', $transformationService->getFullTransformation(355)->getOutput());
    }
    public function testMultiplesOf7andAppendsWords()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);
        $this->assertEquals('Bar,Qix,FooBar', $transformationService->getFullTransformation(350)->getOutput());
    }
    public function testNoTransformation()
    {
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);
        $this->assertEquals('1', $transformationService->getFullTransformation(1)->getOutput());
    }
}