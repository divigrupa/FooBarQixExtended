<?php

namespace Tests\FooBarQixTests;

use App\FooBarQix;
use PHPUnit\Framework\TestCase;

class FooBarQixCombinedTest extends TestCase
{
    public function test_is_result_foo_foo()
    {
        $result = 'FooFoo';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(3));
    }

    public function test_is_result_bar_bar()
    {
        $result = 'BarBar';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(5));
    }

    public function test_is_result_qix_qix()
    {
        $result = 'QixQix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(7));
    }

    public function test_is_result_foo_qix()
    {
        $result = 'FooQix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(203));
    }

    public function test_is_result_qix_foo()
    {
        $result = 'QixFoo';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(27));
    }

    public function test_is_result_bar_foo()
    {
        $result = 'BarFoo';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(51));
    }

    public function test_is_result_bar_qix()
    {
        $result = 'BarQix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(56));
    }

    public function test_is_result_foo_bar()
    {
        $result = 'FooBar';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(130));
    }

    public function test_is_result_qix_bar()
    {
        $result = 'QixBar';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(170));
    }
}