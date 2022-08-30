<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\DivisionService;

final class DivisionServiceTest extends TestCase
{
    public function testInvalidNumbers(): void
    {
        $this->assertEquals( DivisionService::run( -1 ), "-1" );
        $this->assertEquals( DivisionService::run( -100 ), "-100" );
        $this->assertEquals( DivisionService::run( 0 ), "0" );
    }

    public function testOnlyFoo(): void
    {
        $this->assertEquals( DivisionService::run( 3 ), "Foo" );
        $this->assertEquals( DivisionService::run( 999 ), "Foo" );
    }

    public function testOnlyBar(): void
    {
        $this->assertEquals( DivisionService::run( 5 ), "Bar" );
        $this->assertEquals( DivisionService::run( 5000 ), "Bar" );
    }

    public function testOnlyQix(): void
    {
        $this->assertEquals( DivisionService::run( 7 ), "Qix" );
        $this->assertEquals( DivisionService::run( 7777 ), "Qix" );
    }

    public function testTwoWords(): void
    {
        # two words return
        $this->assertEquals( DivisionService::run( 15 ), "Foo, Bar" );
        $this->assertEquals( DivisionService::run( 3000 ), "Foo, Bar" );

        $this->assertEquals( DivisionService::run( 21 ), "Foo, Qix" );
        $this->assertEquals( DivisionService::run( 231 ), "Foo, Qix" );

        $this->assertEquals( DivisionService::run( 35 ), "Bar, Qix" );
        $this->assertEquals( DivisionService::run( 2450 ), "Bar, Qix" );
    }

    public function testThreeWords():void
    {
        $this->assertEquals( DivisionService::run( 105 ), "Foo, Bar, Qix" );
        $this->assertEquals( DivisionService::run( 2310 ), "Foo, Bar, Qix" );
    }

    public function testMustFail():void
    {
        $this->assertEquals( DivisionService::run( 19 ), "19" );
        $this->assertEquals( DivisionService::run( 61 ), "61" );
    }
}