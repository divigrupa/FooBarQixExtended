<?php


use App\FooBar;

test('test case: positive number', function () {
    $fizzBuzz = new FooBar(4);
    expect($fizzBuzz->start())->toBeGreaterThan(0);
});

test('test case: other numbers', function () {
    $fizzBuzz = new FooBar(4);
    expect($fizzBuzz->start())->toEqual('4');
});

test('test case: "3 Foo"', function () {
    $fizzBuzz = new FooBar(3);
    expect($fizzBuzz->start())->toEqual('3 Foo');
});

test('test case: "5 Bar"', function () {
    $fizzBuzz = new FooBar(5);
    expect($fizzBuzz->start())->toEqual('5 Bar');
});

test('test case: "7 Qix"', function () {
    $fizzBuzz = new FooBar(7);
    expect($fizzBuzz->start())->toEqual('7 Qix');
});

test('test case: natural order "105 Qix; Bar; Foo"', function () {
    $fizzBuzz = new FooBar(105);
    expect($fizzBuzz->start())->toEqual('105 Qix; Bar; Foo');
});

test('test case: natural order "168 Inf; Qix; Foo"', function () {
    $fizzBuzz = new FooBar(168);
    expect($fizzBuzz->start())->toEqual('168 Inf; Qix; Foo');
});

test('test case: append Inf "88 InfInf"', function () {
    $fizzBuzz = new FooBar(88);
    expect($fizzBuzz->start())->toEqual('88 InfInf');
});

test('test case: "8 Inf"', function () {
    $fizzBuzz = new FooBar(8);
    expect($fizzBuzz->start())->toEqual('8 Inf');
});




