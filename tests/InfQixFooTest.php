<?php

use App\Models\Foo;
use App\Models\FooBarQixCollection;
use App\Models\Inf;
use App\Models\Qix;
use App\Services\InfQixFooService;
use App\Services\MultipleService;
use App\Services\OccurrenceService;
use PHPUnit\Framework\TestCase;

class InfQixFooTest extends TestCase
{
    public function testMultiples(): void
    {
        $infQixFooCollection = new FooBarQixCollection();
        $infQixFooCollection->addMultiples(new Inf());
        $infQixFooCollection->addMultiples(new Qix());
        $infQixFooCollection->addMultiples(new Foo());

        $multipleService = new MultipleService($infQixFooCollection);
        $this->assertTrue('Inf' === $multipleService->execute(8));
        $this->assertTrue('' === $multipleService->execute(20));
        $this->assertTrue('Qix' === $multipleService->execute(14));
        $this->assertTrue('Foo' === $multipleService->execute(15));
        $this->assertTrue('Qix,Foo' === $multipleService->execute(21));
        $this->assertTrue('Inf,Qix' === $multipleService->execute(56));
        $this->assertTrue('Inf,Qix,Foo' === $multipleService->execute(168));
    }


    public function testOccurrences(): void
    {
        $infQixFooCollection = new FooBarQixCollection();
        $infQixFooCollection->addMultiples(new Inf());
        $infQixFooCollection->addMultiples(new Qix());
        $infQixFooCollection->addMultiples(new Foo());

        $occurrenceService = new OccurrenceService($infQixFooCollection);
        $this->assertTrue('Inf' === $occurrenceService->execute(8));
        $this->assertTrue('Foo' === $occurrenceService->execute(23));
        $this->assertTrue('' === $occurrenceService->execute(56));
        $this->assertTrue('Qix,Inf' === $occurrenceService->execute(798));
        $this->assertTrue('Foo,Inf' === $occurrenceService->execute(38));
        $this->assertTrue('Qix,Foo' === $occurrenceService->execute(743));
        $this->assertTrue('Foo,Inf,Qix' === $occurrenceService->execute(387));
    }

    public function testExecute(): void
    {
        $infQixFooCollection = new FooBarQixCollection();
        $infQixFooCollection->addMultiples(new Inf());
        $infQixFooCollection->addMultiples(new Qix());
        $infQixFooCollection->addMultiples(new Foo());

        $infQixFooService = new InfQixFooService($infQixFooCollection);
        $this->assertTrue('Qix;Inf;Qix;Foo' === $infQixFooService->execute(85673));
        $this->assertTrue('55' === $infQixFooService->execute(55));
        $this->assertTrue('Foo;Foo;Foo' === $infQixFooService->execute(12345435));
        $this->assertTrue('Foo;Qix;Foo;Inf' === $infQixFooService->execute(657438));
        $this->assertTrue('Foo;Qix' === $infQixFooService->execute(447));
    }

    public function testAddEnd(): void
    {
        $infQixFooCollection = new FooBarQixCollection();
        $infQixFooCollection->addMultiples(new Inf());
        $infQixFooCollection->addMultiples(new Qix());
        $infQixFooCollection->addMultiples(new Foo());
        $condition = new Inf();

        $infQixFooService = new InfQixFooService($infQixFooCollection);
        $this->assertTrue('Inf;Qix;FooInf' === $infQixFooService->addEnd(1232, $condition));
        $this->assertTrue('Inf;Foo' === $infQixFooService->addEnd(23456, $condition));
        $this->assertTrue('2222Inf' === $infQixFooService->addEnd(2222, $condition));
        $this->assertTrue('FooInf' === $infQixFooService->addEnd(431, $condition));
        $this->assertTrue('QixInf' === $infQixFooService->addEnd(71, $condition));
    }
}