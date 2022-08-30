<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\InfQixFoo;

final class InfQixFooMultiplesTest extends TestCase
{
    public function testInvalidNumbers(): void
    {
        $this->assertEquals( InfQixFoo::multiples( -1 ), "-1" );
        $this->assertEquals( InfQixFoo::multiples( -100 ), "-100" );
        $this->assertEquals( InfQixFoo::multiples( 0 ), "0" );
    }

    public function testOnlyInf(): void
    {
        $this->assertEquals( InfQixFoo::multiples( 8 ), "Inf" );
        $this->assertEquals( InfQixFoo::multiples( 88 ), "Inf" );
    }

    public function testOnlyQix(): void
    {
        $this->assertEquals( InfQixFoo::multiples( 7 ), "Qix" );
        $this->assertEquals( InfQixFoo::multiples( 77 ), "Qix" );
    }

    public function testOnlyFoo(): void
    {
        $this->assertEquals( InfQixFoo::multiples( 3 ), "Foo" );
        $this->assertEquals( InfQixFoo::multiples( 333 ), "Foo" );
    }

    public function testTwoWords(): void
    {
        # inf - 8, qix - 7, foo - 3
        $this->assertEquals( InfQixFoo::multiples( 21 ), "Qix; Foo" );
        $this->assertEquals( InfQixFoo::multiples( 63 ), "Qix; Foo" );

        $this->assertEquals( InfQixFoo::multiples( 24 ), "Inf; Foo" );
        $this->assertEquals( InfQixFoo::multiples( 72 ), "Inf; Foo" );

        $this->assertEquals( InfQixFoo::multiples( 56 ), "Inf; Qix" );
        $this->assertEquals( InfQixFoo::multiples( 448 ), "Inf; Qix" );
    }

    public function testThreeWords():void
    {
        $this->assertEquals( InfQixFoo::multiples( 8*7*3 ), "Inf; Qix; Foo" );
        $this->assertEquals( InfQixFoo::multiples( 64*7*9 ), "Inf; Qix; Foo" );
    }

    public function testMustFail():void
    {
        $this->assertEquals( InfQixFoo::multiples( 19 ), "19" );
        $this->assertEquals( InfQixFoo::multiples( 61 ), "61" );
    }
}