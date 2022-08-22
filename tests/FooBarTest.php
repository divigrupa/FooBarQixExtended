<?php

use App\FooBar;

test("should return 'Foo' if number is multiple of 3", function() {
    $fooBar = new FooBar(3);
    expect($fooBar->run)->toEqual("Foo");
});

test("should return 'Bar' if number is multiple of 5", function() {
    $fooBar = new FooBar(5);
    expect($fooBar->run)->toEqual("Bar");
});

test("should return 'Foo, Bar' if number is multiple of 3 and 5", function() {
    $fooBar = new FooBar(15);
    expect($fooBar->run)->toEqual("Foo, Bar");
});

test("should return given number as a string if there is no transformation to do", function() {
    $fooBar = new FooBar(7);
    expect($fooBar->run)->toEqual("7");
});