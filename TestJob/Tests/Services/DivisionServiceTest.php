<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\DivisionService;

final class DivisionServiceTest extends TestCase
{
    public function testPushAndPop(): void
    {
        # invalid numbers
        $this->assertEquals( DivisionService::run( -1 ), "-1" );
        $this->assertEquals( DivisionService::run( -100 ), "-100" );
        $this->assertEquals( DivisionService::run( 0 ), "0" );

        # normal division
        $this->assertEquals( DivisionService::run( 3 ), "Foo" );
        $this->assertEquals( DivisionService::run( 999 ), "Foo" );
        $this->assertEquals( DivisionService::run( 5 ), "Bar" );
        $this->assertEquals( DivisionService::run( 5000 ), "Bar" );
        $this->assertEquals( DivisionService::run( 15 ), "Foo, Bar" );
        $this->assertEquals( DivisionService::run( 3000 ), "Foo, Bar" );

        # fail division
        $this->assertEquals( DivisionService::run( 19 ), "19" );
        $this->assertEquals( DivisionService::run( 61 ), "61" );
    }
}