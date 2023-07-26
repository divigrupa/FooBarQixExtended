<?php
use App\Services\InfQixFooTransformer;
use App\Services\NumberTransformationService;
use PHPUnit\Framework\TestCase;
class InfQixFooDigitSumTransformationTest extends TestCase
{
    public function testSumTransformation()
    {
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $this->assertEquals('Inf', $transformationService->getSumTransformation(8)->getOutput());
        $this->assertEquals('Inf', $transformationService->getSumTransformation(16)->getOutput());
        $this->assertEquals('', $transformationService->getSumTransformation(15)->getOutput());
    }
}