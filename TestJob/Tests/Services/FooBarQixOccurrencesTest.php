<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\FooBarQix;

final class FooBarQixOccurrencesTest extends TestCase
{
    public function testOnlyFoo(): void
    {
        $this->assertEquals( FooBarQix::occurrences( 3 ), "Foo" );
        $this->assertEquals( FooBarQix::occurrences( 333 ), "FooFooFoo" );
        $this->assertEquals( FooBarQix::occurrences( 11113 ), "Foo" );
        $this->assertEquals( FooBarQix::occurrences( 31111 ), "Foo" );
        $this->assertEquals( FooBarQix::occurrences( 11311311 ), "FooFoo" );
        $this->assertEquals( FooBarQix::occurrences( 13131 ), "FooFoo" );

        $this->assertEquals( FooBarQix::occurrences( -3 ), "Foo" );
        $this->assertEquals( FooBarQix::occurrences( -333 ), "FooFooFoo" );
        $this->assertEquals( FooBarQix::occurrences( -11113 ), "Foo" );
        $this->assertEquals( FooBarQix::occurrences( -31111 ), "Foo" );
        $this->assertEquals( FooBarQix::occurrences( -11311311 ), "FooFoo" );
        $this->assertEquals( FooBarQix::occurrences( -13131 ), "FooFoo" );
    }

    public function testOnlyBar(): void
    {
        $this->assertEquals( FooBarQix::occurrences( 5 ), "Bar" );
        $this->assertEquals( FooBarQix::occurrences( 555 ), "BarBarBar" );
        $this->assertEquals( FooBarQix::occurrences( 11115 ), "Bar" );
        $this->assertEquals( FooBarQix::occurrences( 51111 ), "Bar" );
        $this->assertEquals( FooBarQix::occurrences( 11511511 ), "BarBar" );
        $this->assertEquals( FooBarQix::occurrences( 15151 ), "BarBar" );

        $this->assertEquals( FooBarQix::occurrences( -5 ), "Bar" );
        $this->assertEquals( FooBarQix::occurrences( -555 ), "BarBarBar" );
        $this->assertEquals( FooBarQix::occurrences( -11115 ), "Bar" );
        $this->assertEquals( FooBarQix::occurrences( -51111 ), "Bar" );
        $this->assertEquals( FooBarQix::occurrences( -11511511 ), "BarBar" );
        $this->assertEquals( FooBarQix::occurrences( -15151 ), "BarBar" );
    }

    public function testOnlyQix(): void
    {
        $this->assertEquals( FooBarQix::occurrences( 7 ), "Qix" );
        $this->assertEquals( FooBarQix::occurrences( 777 ), "QixQixQix" );
        $this->assertEquals( FooBarQix::occurrences( 11117 ), "Qix" );
        $this->assertEquals( FooBarQix::occurrences( 71111 ), "Qix" );
        $this->assertEquals( FooBarQix::occurrences( 11711711 ), "QixQix" );
        $this->assertEquals( FooBarQix::occurrences( 17171 ), "QixQix" );

        $this->assertEquals( FooBarQix::occurrences( -7 ), "Qix" );
        $this->assertEquals( FooBarQix::occurrences( -777 ), "QixQixQix" );
        $this->assertEquals( FooBarQix::occurrences( -11117 ), "Qix" );
        $this->assertEquals( FooBarQix::occurrences( -71111 ), "Qix" );
        $this->assertEquals( FooBarQix::occurrences( -11711711 ), "QixQix" );
        $this->assertEquals( FooBarQix::occurrences( -17171 ), "QixQix" );
    }

    public function testMultiple(): void
    {
        # 3, 5, 7
        $this->assertEquals( FooBarQix::occurrences( 357 ), "FooBarQix" );
        $this->assertEquals( FooBarQix::occurrences( 1315171 ), "FooBarQix" );
        $this->assertEquals( FooBarQix::occurrences( 1234456667 ), "FooBarQix" );
        $this->assertEquals( FooBarQix::occurrences( 335577 ), "FooFooBarBarQixQix" );
        $this->assertEquals( FooBarQix::occurrences( 3315151717 ), "FooFooBarBarQixQix" );
    }

    public function testMustFail(): void
    {
        $this->assertEquals( FooBarQix::occurrences( 1 ), "" );
        $this->assertEquals( FooBarQix::occurrences( 2 ), "" );
        $this->assertEquals( FooBarQix::occurrences( 4 ), "" );
        $this->assertEquals( FooBarQix::occurrences( 6 ), "" );
        $this->assertEquals( FooBarQix::occurrences( 8 ), "" );
        $this->assertEquals( FooBarQix::occurrences( 9 ), "" );

        $this->assertEquals( FooBarQix::occurrences( 0 ), "" );

        $this->assertEquals( FooBarQix::occurrences( -1 ), "" );
        $this->assertEquals( FooBarQix::occurrences( -2 ), "" );
        $this->assertEquals( FooBarQix::occurrences( -4 ), "" );
        $this->assertEquals( FooBarQix::occurrences( -6 ), "" );
        $this->assertEquals( FooBarQix::occurrences( -8 ), "" );
        $this->assertEquals( FooBarQix::occurrences( -9 ), "" );
    }
}