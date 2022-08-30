<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\FooBarQix;

final class FooBarQixMultiplesTest extends TestCase
{
    public function testInvalidNumbers(): void
    {
        $this->assertEquals( FooBarQix::multiples( -1 ), "-1" );
        $this->assertEquals( FooBarQix::multiples( -100 ), "-100" );
        $this->assertEquals( FooBarQix::multiples( 0 ), "0" );
    }

    public function testOnlyFoo(): void
    {
        $this->assertEquals( FooBarQix::multiples( 3 ), "Foo" );
        $this->assertEquals( FooBarQix::multiples( 999 ), "Foo" );
    }

    public function testOnlyBar(): void
    {
        $this->assertEquals( FooBarQix::multiples( 5 ), "Bar" );
        $this->assertEquals( FooBarQix::multiples( 5000 ), "Bar" );
    }

    public function testOnlyQix(): void
    {
        $this->assertEquals( FooBarQix::multiples( 7 ), "Qix" );
        $this->assertEquals( FooBarQix::multiples( 7777 ), "Qix" );
    }

    public function testTwoWords(): void
    {
        # two words return
        $this->assertEquals( FooBarQix::multiples( 15 ), "Foo, Bar" );
        $this->assertEquals( FooBarQix::multiples( 3000 ), "Foo, Bar" );

        $this->assertEquals( FooBarQix::multiples( 21 ), "Foo, Qix" );
        $this->assertEquals( FooBarQix::multiples( 231 ), "Foo, Qix" );

        $this->assertEquals( FooBarQix::multiples( 35 ), "Bar, Qix" );
        $this->assertEquals( FooBarQix::multiples( 2450 ), "Bar, Qix" );
    }

    public function testThreeWords():void
    {
        $this->assertEquals( FooBarQix::multiples( 105 ), "Foo, Bar, Qix" );
        $this->assertEquals( FooBarQix::multiples( 2310 ), "Foo, Bar, Qix" );
    }

    public function testMustFail():void
    {
        $this->assertEquals( FooBarQix::multiples( 19 ), "19" );
        $this->assertEquals( FooBarQix::multiples( 61 ), "61" );
    }
}