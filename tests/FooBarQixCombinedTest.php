<?php

use App\FooBar;
use PHPUnit\Framework\TestCase;

class FooBarQixCombinedTest extends TestCase
{
    public function test_is_result_foo_foo()
    {
        $result = 'Foo, Foo';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar', 'Qix'))->numberText(3));
    }

    public function test_is_result_bar_bar()
    {
        $result = 'Bar, Bar';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar', 'Qix'))->numberText(5));
    }

    public function test_is_result_qix_qix()
    {
        $result = 'Qix, Qix';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar', 'Qix'))->numberText(7));
    }

    public function test_is_result_foo_qix()
    {
        $result = 'Foo, Qix';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar', 'Qix'))->numberText(203));
    }

    public function test_is_result_qix_foo()
    {
        $result = 'Qix, Foo';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar', 'Qix'))->numberText(27));
    }

    public function test_is_result_bar_foo()
    {
        $result = 'Bar, Foo';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar', 'Qix'))->numberText(51));
    }

    public function test_is_result_bar_qix()
    {
        $result = 'Bar, Qix';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar', 'Qix'))->numberText(56));
    }

    public function test_is_result_foo_bar()
    {
        $result = 'Foo, Bar';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar', 'Qix'))->numberText(130));
    }

    public function test_is_result_qix_bar()
    {
        $result = 'Qix, Bar';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar', 'Qix'))->numberText(170));
    }
}