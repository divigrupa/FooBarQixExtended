<?php


use App\FooBar;

test('test case: other numbers', function () {
    $fizzBuzz = new FooBar(4);
    expect($fizzBuzz->start())->toEqual('4');
});

test('test case: "Foo"', function () {
    $fizzBuzz = new FooBar(3);
    expect($fizzBuzz->start())->toEqual('Foo');
});

test('test case: "Bar"', function () {
    $fizzBuzz = new FooBar(5);
    expect($fizzBuzz->start())->toEqual('Bar');
});

