<?php
namespace Tests;

use App\Services\FooBarQixService;
use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{
    public function testExecute(): void
    {
        $fooBarQixService = new FooBarQixService();
        $this->assertIsString($fooBarQixService->execute(7));
        $this->assertTrue('Foo' === $fooBarQixService->execute(6));
        $this->assertTrue('Bar' === $fooBarQixService->execute(20));
        $this->assertTrue('Foo,Bar' === $fooBarQixService->execute(15));
    }
}