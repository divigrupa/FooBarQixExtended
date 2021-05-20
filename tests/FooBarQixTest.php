<?php
namespace Tests;

use App\Services\FooBarQixService;
use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{
    public function testExecute(): void
    {
        $fooBarQixService = new FooBarQixService();
        $this->assertIsString($fooBarQixService->execute(8));
        $this->assertTrue('Foo' === $fooBarQixService->execute(6));
        $this->assertTrue('Bar' === $fooBarQixService->execute(20));
        $this->assertTrue('Qix' === $fooBarQixService->execute(14));
        $this->assertTrue('Foo,Bar' === $fooBarQixService->execute(15));
        $this->assertTrue('Foo,Qix' === $fooBarQixService->execute(21));
        $this->assertTrue('Bar,Qix' === $fooBarQixService->execute(35));
        $this->assertTrue('Foo,Bar,Qix' === $fooBarQixService->execute(105));

    }
}