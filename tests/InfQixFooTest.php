<?php

use App\InfQixFoo;

test("should return 'Inf' if number is multiple of 8", function() {
    $infQixFoo = new InfQixFoo(8);
    expect($infQixFoo->determineMultiples())->toEqual("Inf");
});

test("should return 'Qix' if number is multiple of 7", function() {
    $infQixFoo = new InfQixFoo(7);
    expect($infQixFoo->determineMultiples())->toEqual("Qix");
});

test("should return 'Foo' if number is multiple of 3", function() {
    $infQixFoo = new InfQixFoo(3);
    expect($infQixFoo->determineMultiples())->toEqual("Foo");
});

test("should return 'Inf; Qix' if number is multiple of 8 and 7", function() {
    $infQixFoo = new InfQixFoo(56);
    expect($infQixFoo->determineMultiples())->toEqual("Inf; Qix");
});

test("should return 'Inf; Foo' if number is multiple of 8 and 7", function() {
    $infQixFoo = new InfQixFoo(24);
    expect($infQixFoo->determineMultiples())->toEqual("Inf; Foo");
});

test("should return 'Inf; Qix; Foo' if number is multiple of 8, 7 and 3", function() {
    $infQixFoo = new InfQixFoo(168);
    expect($infQixFoo->determineMultiples())->toEqual("Inf; Qix; Foo");
});

test("should return given number as a string if there is no transformation to do", function() {
    $infQixFoo = new InfQixFoo(1);
    expect($infQixFoo->run())->toEqual("1");
});

test("if number contains 8, append 'Inf'", function() {
    $infQixFoo = new InfQixFoo(148);
    expect($infQixFoo->determineAppearances())->toEqual("1; 4; Inf");
});

test("if number contains 7, append 'Qix'", function() {
    $infQixFoo = new InfQixFoo(127);
    expect($infQixFoo->determineAppearances())->toEqual("1; 2; Qix");
});

test("if number contains 3, append 'Foo'", function() {
    $infQixFoo = new InfQixFoo(321);
    expect($infQixFoo->determineAppearances())->toEqual("Foo; 2; 1");
});

test("if number contains 8, 7 and 3 append 'Inf; Qix; Foo'", function() {
    $infQixFoo = new InfQixFoo(873);
    expect($infQixFoo->determineAppearances())->toEqual("Inf; Qix; Foo");
});

test("should return 'Inf; Foo' if number is multiple of 8 and 3 and if it contains 7, append 'Qix'", function() {
    $infQixFoo = new InfQixFoo(72);
    expect($infQixFoo->run())->toEqual("Inf; Qix; Foo; 2");
});

test("should return 'Inf; Foo; Qix' if number is multiple of 8 and 3, and 7 and if it contains 8, append 'Inf'", function() {
    $infQixFoo = new InfQixFoo(168);
    expect($infQixFoo->run())->toEqual("Inf; Qix; Foo; 1; 6; Inf");
});