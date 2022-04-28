<?php declare(strict_types=1);

namespace Tests;

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{
    public function test3Foo(): void
    {
        $step1 = new FooBarQix;

        $this->assertSame('Foo', $step1->isMultiple(3));
    }

    public function test5Bar(): void
    {
        $step1 = new FooBarQix;

        $this->assertSame('Bar', $step1->isMultiple(5));

    }

    public function test35FooBar(): void
    {
        $step1 = new FooBarQix;

        $this->assertSame('Foo, Bar', $step1->isMultiple(15));
    }
}


