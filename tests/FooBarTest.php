<?php

use App\FooBar;

test("should return 'Foo' if number is multiple of 3", function() {
    $fooBar = new FooBar(3);
    expect($fooBar->run())->toEqual("Foo");
});

test("should return 'Bar' if number is multiple of 5", function() {
    $fooBar = new FooBar(5);
    expect($fooBar->run())->toEqual("Bar");
});

test("should return 'FooBar' if number is multiple of 3 and 5", function() {
    $fooBar = new FooBar(15);
    expect($fooBar->run())->toEqual("FooBar");
});

test("should return 'FooBarQix' if number is multiple of 3 and 5, and 7", function() {
    $fooBar = new FooBar(105);
    expect($fooBar->run())->toEqual("FooBarQix");
});

test("should return given number as a string if there is no transformation to do", function() {
    $fooBar = new FooBar(1);
    expect($fooBar->run())->toEqual("1");
});

test("if number contains 3, append 'Foo'", function() {
    $fooBar = new FooBar(143);
    expect($fooBar->run())->toEqual("14Foo");
});

test("if number contains 5, append 'Bar'", function() {
    $fooBar = new FooBar(56);
    expect($fooBar->run())->toEqual("Bar6");
});

test("if number contains 7, append 'Qix'", function() {
    $fooBar = new FooBar(781);
    expect($fooBar->run())->toEqual("Qix81");
});

test("if number contains 3 and 5, and 7, append 'FooBarQix'", function() {
    $fooBar = new FooBar(56387);
    expect($fooBar->run())->toEqual("Bar6Foo8Qix");
});

test("should return 'FooBar' if number is multiple of 3 and 5 and if it contains 3 and 5, and 7, append 'FooBarQix'", function() {
    $fooBar = new FooBar(375);
    expect($fooBar->run())->toEqual("FooBarFooQixBar");
});

test("should return 'Foo' if number is multiple of 3 and if it contains 7, append 'Qix'", function() {
    $fooBar = new FooBar(789);
    expect($fooBar->run())->toEqual("FooQix89");
});