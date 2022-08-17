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

test('test case: natural order "105 Foo, Bar, Qix"', function () {
    $fizzBuzz = new FooBar(105);
    expect($fizzBuzz->start())->toEqual('105 Foo Bar Qix');
});

