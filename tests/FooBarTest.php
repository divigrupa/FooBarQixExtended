<?php

use App\FooBar;

test("should return 'Foo' if number is multiple of 3", function() {
    $fooBar = new FooBar(3);
    expect($fooBar->determineMultiples())->toEqual("Foo");
});

test("should return 'Bar' if number is multiple of 5", function() {
    $fooBar = new FooBar(5);
    expect($fooBar->determineMultiples())->toEqual("Bar");
});

test("should return 'FooBar' if number is multiple of 3 and 5", function() {
    $fooBar = new FooBar(90);
    expect($fooBar->determineMultiples())->toEqual("FooBar");
});

test("should return 'FooBarQix' if number is multiple of 3 and 5, and 7", function() {
    $fooBar = new FooBar(105);
    expect($fooBar->determineMultiples())->toEqual("FooBarQix");
});

test("should return given number as a string if there is no transformation to do", function() {
    $fooBar = new FooBar(1);
    expect($fooBar->run())->toEqual("1");
});

test("if number contains 3, append 'Foo'", function() {
    $fooBar = new FooBar(143);
    expect($fooBar->determineAppearances())->toEqual("14Foo");
});

test("if number contains 5, append 'Bar'", function() {
    $fooBar = new FooBar(52);
    expect($fooBar->determineAppearances())->toEqual("Bar2");
});

test("if number contains 7, append 'Qix'", function() {
    $fooBar = new FooBar(781);
    expect($fooBar->determineAppearances())->toEqual("Qix81");
});

test("if number contains 3 and 5, and 7, append 'FooBarQix'", function() {
    $fooBar = new FooBar(56387);
    expect($fooBar->determineAppearances())->toEqual("Bar6Foo8Qix");
});

test("should return 'FooBar' if number is multiple of 3 and 5 and if it contains 3 and 5, and 7, append 'FooBarQix'", function() {
    $fooBar = new FooBar(375);
    expect($fooBar->run())->toEqual("FooBarFooQixBar");
});

test("should return 'Foo' if number is multiple of 3 and if it contains 7, append 'Qix'", function() {
    $fooBar = new FooBar(789);
    expect($fooBar->run())->toEqual("FooQix89");
});

test("should return 'FooBarQix' if number is multiple of 3, 5 and 7 and if it contains 5, append 'Bar'", function() {
    $fooBar = new FooBar(105);
    expect($fooBar->run())->toEqual("FooBarQix10Bar");
});