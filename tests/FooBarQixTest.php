<?php

namespace Tests;

use App\Models\Bar;
use App\Models\Foo;
use App\Models\FooBarQixCollection;
use App\Models\Qix;
use App\Services\FooBarQixService;
use App\Services\MultipleService;
use App\Services\OccurrenceService;
use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{

    public function testMultiples(): void
    {
        $fooBarQixCollection = new FooBarQixCollection();
        $fooBarQixCollection->addMultiples(new Foo());
        $fooBarQixCollection->addMultiples(new Bar());
        $fooBarQixCollection->addMultiples(new Qix());

        $multipleService = new MultipleService($fooBarQixCollection);
        $this->assertTrue('' === $multipleService->execute(8));
        $this->assertTrue('Foo' === $multipleService->execute(6));
        $this->assertTrue('Bar' === $multipleService->execute(20));
        $this->assertTrue('Qix' === $multipleService->execute(14));
        $this->assertTrue('Foo,Bar' === $multipleService->execute(15));
        $this->assertTrue('Foo,Qix' === $multipleService->execute(21));
        $this->assertTrue('Bar,Qix' === $multipleService->execute(35));
        $this->assertTrue('Foo,Bar,Qix' === $multipleService->execute(105));
    }


    public function testOccurrences(): void
    {
        $fooBarQixCollection = new FooBarQixCollection();
        $fooBarQixCollection->addMultiples(new Foo());
        $fooBarQixCollection->addMultiples(new Bar());
        $fooBarQixCollection->addMultiples(new Qix());

        $occurrenceService = new OccurrenceService($fooBarQixCollection);
        $this->assertTrue('' === $occurrenceService->execute(8));
        $this->assertTrue('Foo' === $occurrenceService->execute(23));
        $this->assertTrue('Bar' === $occurrenceService->execute(56));
        $this->assertTrue('Qix' === $occurrenceService->execute(798));
        $this->assertTrue('Foo,Bar' === $occurrenceService->execute(35));
        $this->assertTrue('Qix,Foo' === $occurrenceService->execute(743));
        $this->assertTrue('Bar,Qix' === $occurrenceService->execute(587));
        $this->assertTrue('Bar,Foo,Qix' === $occurrenceService->execute(537));
    }

    public function testExecute(): void
    {
        $fooBarQixCollection = new FooBarQixCollection();
        $fooBarQixCollection->addMultiples(new Foo());
        $fooBarQixCollection->addMultiples(new Bar());
        $fooBarQixCollection->addMultiples(new Qix());

        $fooBarQixService = new FooBarQixService($fooBarQixCollection);
        $this->assertTrue('8462' === $fooBarQixService->execute(8462));
        $this->assertTrue('Qix,Foo' === $fooBarQixService->execute(743));
        $this->assertTrue('Foo,Bar,Foo,Bar,Foo,Bar' === $fooBarQixService->execute(12345435));
        $this->assertTrue('Bar,Qix,Foo' === $fooBarQixService->execute(65743));
        $this->assertTrue('Foo,Qix' === $fooBarQixService->execute(447));
    }
}