<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\NumberService;

final class NumberServiceMultiplesTest extends TestCase
{
    public function testInvalidNumbers(): void
    {
        $this->assertEquals( NumberService::multiples( -1 ), "-1" );
        $this->assertEquals( NumberService::multiples( -100 ), "-100" );
        $this->assertEquals( NumberService::multiples( 0 ), "0" );
    }

    public function testOnlyFoo(): void
    {
        $this->assertEquals( NumberService::multiples( 3 ), "Foo" );
        $this->assertEquals( NumberService::multiples( 999 ), "Foo" );
    }

    public function testOnlyBar(): void
    {
        $this->assertEquals( NumberService::multiples( 5 ), "Bar" );
        $this->assertEquals( NumberService::multiples( 5000 ), "Bar" );
    }

    public function testOnlyQix(): void
    {
        $this->assertEquals( NumberService::multiples( 7 ), "Qix" );
        $this->assertEquals( NumberService::multiples( 7777 ), "Qix" );
    }

    public function testTwoWords(): void
    {
        # two words return
        $this->assertEquals( NumberService::multiples( 15 ), "Foo, Bar" );
        $this->assertEquals( NumberService::multiples( 3000 ), "Foo, Bar" );

        $this->assertEquals( NumberService::multiples( 21 ), "Foo, Qix" );
        $this->assertEquals( NumberService::multiples( 231 ), "Foo, Qix" );

        $this->assertEquals( NumberService::multiples( 35 ), "Bar, Qix" );
        $this->assertEquals( NumberService::multiples( 2450 ), "Bar, Qix" );
    }

    public function testThreeWords():void
    {
        $this->assertEquals( NumberService::multiples( 105 ), "Foo, Bar, Qix" );
        $this->assertEquals( NumberService::multiples( 2310 ), "Foo, Bar, Qix" );
    }

    public function testMustFail():void
    {
        $this->assertEquals( NumberService::multiples( 19 ), "19" );
        $this->assertEquals( NumberService::multiples( 61 ), "61" );
    }
}