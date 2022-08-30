<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\NumberService;

final class NumberServiceOccurrencesTest extends TestCase
{
    public function testOnlyFoo(): void
    {
        $this->assertEquals( NumberService::occurrences( 3 ), "Foo" );
        $this->assertEquals( NumberService::occurrences( 333 ), "FooFooFoo" );
        $this->assertEquals( NumberService::occurrences( 11113 ), "Foo" );
        $this->assertEquals( NumberService::occurrences( 31111 ), "Foo" );
        $this->assertEquals( NumberService::occurrences( 11311311 ), "FooFoo" );
        $this->assertEquals( NumberService::occurrences( 13131 ), "FooFoo" );

        $this->assertEquals( NumberService::occurrences( -3 ), "Foo" );
        $this->assertEquals( NumberService::occurrences( -333 ), "FooFooFoo" );
        $this->assertEquals( NumberService::occurrences( -11113 ), "Foo" );
        $this->assertEquals( NumberService::occurrences( -31111 ), "Foo" );
        $this->assertEquals( NumberService::occurrences( -11311311 ), "FooFoo" );
        $this->assertEquals( NumberService::occurrences( -13131 ), "FooFoo" );
    }

    public function testOnlyBar(): void
    {
        $this->assertEquals( NumberService::occurrences( 5 ), "Bar" );
        $this->assertEquals( NumberService::occurrences( 555 ), "BarBarBar" );
        $this->assertEquals( NumberService::occurrences( 11115 ), "Bar" );
        $this->assertEquals( NumberService::occurrences( 51111 ), "Bar" );
        $this->assertEquals( NumberService::occurrences( 11511511 ), "BarBar" );
        $this->assertEquals( NumberService::occurrences( 15151 ), "BarBar" );

        $this->assertEquals( NumberService::occurrences( -5 ), "Bar" );
        $this->assertEquals( NumberService::occurrences( -555 ), "BarBarBar" );
        $this->assertEquals( NumberService::occurrences( -11115 ), "Bar" );
        $this->assertEquals( NumberService::occurrences( -51111 ), "Bar" );
        $this->assertEquals( NumberService::occurrences( -11511511 ), "BarBar" );
        $this->assertEquals( NumberService::occurrences( -15151 ), "BarBar" );
    }

    public function testOnlyQix(): void
    {
        $this->assertEquals( NumberService::occurrences( 7 ), "Qix" );
        $this->assertEquals( NumberService::occurrences( 777 ), "QixQixQix" );
        $this->assertEquals( NumberService::occurrences( 11117 ), "Qix" );
        $this->assertEquals( NumberService::occurrences( 71111 ), "Qix" );
        $this->assertEquals( NumberService::occurrences( 11711711 ), "QixQix" );
        $this->assertEquals( NumberService::occurrences( 17171 ), "QixQix" );

        $this->assertEquals( NumberService::occurrences( -7 ), "Qix" );
        $this->assertEquals( NumberService::occurrences( -777 ), "QixQixQix" );
        $this->assertEquals( NumberService::occurrences( -11117 ), "Qix" );
        $this->assertEquals( NumberService::occurrences( -71111 ), "Qix" );
        $this->assertEquals( NumberService::occurrences( -11711711 ), "QixQix" );
        $this->assertEquals( NumberService::occurrences( -17171 ), "QixQix" );
    }

    public function testMultiple(): void
    {
        # 3, 5, 7
        $this->assertEquals( NumberService::occurrences( 357 ), "FooBarQix" );
        $this->assertEquals( NumberService::occurrences( 1315171 ), "FooBarQix" );
        $this->assertEquals( NumberService::occurrences( 1234456667 ), "FooBarQix" );
        $this->assertEquals( NumberService::occurrences( 335577 ), "FooFooBarBarQixQix" );
        $this->assertEquals( NumberService::occurrences( 3315151717 ), "FooFooBarBarQixQix" );
    }

    public function testMustFail(): void
    {
        $this->assertEquals( NumberService::occurrences( 1 ), "" );
        $this->assertEquals( NumberService::occurrences( 2 ), "" );
        $this->assertEquals( NumberService::occurrences( 4 ), "" );
        $this->assertEquals( NumberService::occurrences( 6 ), "" );
        $this->assertEquals( NumberService::occurrences( 8 ), "" );
        $this->assertEquals( NumberService::occurrences( 9 ), "" );

        $this->assertEquals( NumberService::occurrences( 0 ), "" );

        $this->assertEquals( NumberService::occurrences( -1 ), "" );
        $this->assertEquals( NumberService::occurrences( -2 ), "" );
        $this->assertEquals( NumberService::occurrences( -4 ), "" );
        $this->assertEquals( NumberService::occurrences( -6 ), "" );
        $this->assertEquals( NumberService::occurrences( -8 ), "" );
        $this->assertEquals( NumberService::occurrences( -9 ), "" );
    }
}