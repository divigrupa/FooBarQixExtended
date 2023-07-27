<?php

use App\Controllers\TransformationController;
use App\Models\Output;
use PHPUnit\Framework\TestCase;

class TransformationControllerTest extends TestCase
{
    private TransformationController $controller;

    protected function setUp(): void
    {
        $this->controller = new TransformationController();
    }

    public function testFooBarQixController()
    {
        $output = $this->controller->fooBarQixTransformer(1);
        $this->assertInstanceOf(Output::class, $output);
        $this->assertEquals(1, $output->getOutput());
    }

    public function testInfQixFooController()
    {
        $output = $this->controller->InfQixFooTransformer(1);
        $this->assertInstanceOf(Output::class, $output);
        $this->assertEquals(1, $output->getOutput());
    }
}
