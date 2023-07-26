<?php

use App\Services\InfQixFooTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;

class InfQixFooDigitSumTransformationTest extends TestCase
{
    private NumberTransformationService $transformationService;
    protected function setUp(): void
    {
        $transformer = new InfQixFooTransformer();
        $this->transformationService = new NumberTransformationService($transformer);
    }
    public function testSumTransformation()
    {
        $this->assertEquals('Inf', $this->transformationService->getSumTransformation(8)->getOutput());
        $this->assertEquals('Inf', $this->transformationService->getSumTransformation(161)->getOutput());
        $this->assertEquals('', $this->transformationService->getSumTransformation(15)->getOutput());
    }
}