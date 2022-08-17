<?php


use App\FooBar;

test('test case: "Foo"', function () {
    $fizzBuzz = new FooBar(3);
    expect($fizzBuzz->start())->toEqual('1 2 Foo');
});

test('test case: "Bar"', function () {
    $fizzBuzz = new FooBar(5);
    expect($fizzBuzz->start())->toEqual('1 2 Foo 4 Bar');
});

