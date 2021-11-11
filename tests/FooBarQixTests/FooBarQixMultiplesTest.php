<?php

namespace Tests\FooBarQixTests;

use App\FooBarQix;
use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class FooBarQixMultiplesTest extends TestCase
{
    public function test_is_result_foo()
    {
        $result = 'Foo';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(6));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(9));
    }

    public function test_is_result_bar()
    {
        $result = 'Bar';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(10));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(20));
    }

    public function test_is_result_qix()
    {
        $result = 'Qix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(14));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(28));
    }

    public function test_is_result_foo_bar()
    {
        $result = 'Foo, Bar';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(60));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(90));
    }

    public function test_is_result_foo_qix()
    {
        $result = 'Foo, Qix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(21));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(42));
    }

    public function test_is_result_bar_qix()
    {
        $result = 'Bar, Qix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(140));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(280));
    }

    public function test_is_result_foo_bar_qix()
    {
        $result = 'Foo, Bar, Qix';

        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(210));
        $this->assertEquals($result, (new FooBarQix('Qix', 'Bar', 'Foo'))->numberText(420));
    }
}