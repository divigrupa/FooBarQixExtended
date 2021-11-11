<?php

use App\FooBar;
use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{
    public function test_is_result_foo()
    {
        $result = 'Foo';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(3));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(6));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(12));
    }

    public function test_is_result_bar()
    {
        $result = 'Bar';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(5));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(10));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(25));
    }

    public function test_is_result_qix()
    {
        $result = 'Qix';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(7));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(14));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(28));
    }

    public function test_is_result_foo_bar()
    {
        $result = 'Foo, Bar';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(15));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(30));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(90));
    }

    public function test_is_result_foo_qix()
    {
        $result = 'Foo, Qix';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(21));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(42));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(84));
    }

    public function test_is_result_bar_qix()
    {
        $result = 'Bar, Qix';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(35));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(70));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(140));
    }

    public function test_is_result_foo_bar_qix()
    {
        $result = 'Foo, Bar, Qix';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(105));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(210));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(420));
    }
}