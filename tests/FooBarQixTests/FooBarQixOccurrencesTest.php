<?php

namespace Tests\FooBarQixTests;

use App\FooBarQix;
use PHPUnit\Framework\TestCase;

class FooBarQixOccurrencesTest extends TestCase
{
    public function test_is_result_foo()
    {
        $result = 'Foo';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(13));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(23));
    }

    public function test_is_result_qix()
    {
        $result = 'Qix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(17));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(47));
    }

    public function test_is_result_foo_qix()
    {
        $result = 'FooQix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(37));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(137));
    }

    public function test_is_result_qix_foo()
    {
        $result = 'QixFoo';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(73));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(173));
    }

    public function test_is_result_bar_foo()
    {
        $result = 'BarFoo';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(53));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(253));
    }

    public function test_is_result_bar_qix()
    {
        $result = 'BarQix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(157));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(457));
    }
}