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

test('test case: "Qix"', function () {
    $fizzBuzz = new FooBar(7);
    expect($fizzBuzz->start())->toEqual('Qix');
});

test('test case: natural order "Foo, Bar, Qix"', function () {
    $fizzBuzz = new FooBar(105);
    expect($fizzBuzz->start())->toEqual('Foo Bar Qix');
});

