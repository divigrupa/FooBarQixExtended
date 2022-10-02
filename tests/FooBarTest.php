<?php

use App\FooBar;

test("Return Foo if number given is a multiple of 3", function () {
    $fooBar = new FooBar(3);
    expect($fooBar->print())->toEqual("Foo");
});

test("Return Bar if number given is a multiple of 5", function () {
    $fooBar = new FooBar(5);
    expect($fooBar->print())->toEqual("Bar");
});

test("Return FooBar if number given is a multiple of 3 and 5", function () {
    $fooBar = new FooBar(15);
    expect($fooBar->print())->toEqual("FooBar");
});

test("Return number given as a string if the number isn't a multiple of 3 or 5", function () {
    $fooBar = new FooBar(16);
    expect($fooBar->print())->toEqual("16");
});
test("Return FooBarQix if number given is a multiple of 3 and 5 and 7", function () {
    $fooBar = new FooBar(105);
    expect($fooBar->print())->toEqual("105");
});
test("Append Foo if number given contains 3", function () {
    $fooBar = new FooBar(23);
    expect($fooBar->print())->toEqual("2Foo");
});
test("Append Bar if number given contains 5", function () {
    $fooBar = new FooBar(52);
    expect($fooBar->print())->toEqual("Bar2");
});
test("Append Qix if number given contains 7", function () {
    $fooBar = new FooBar(701);
    expect($fooBar->print())->toEqual("Qix01");
});
test("Append FooBarQix if number given contains 3 and 5, and 7", function () {
    $fooBar = new FooBar(76532);
    expect($fooBar->print())->toEqual("Qix6BarFoo2");
});
test("Return Foo if number given is a multiple of 3, then append FooBarQix if number given contains 3 and 5 and 7", function () {
    $fooBar = new FooBar(375);
    expect($fooBar->print())->toEqual("FooBarFooQixBar");
});
test("Return Foo if number given is a multiple of 3, then append Qix if number given contains 7", function () {
    $fooBar = new FooBar(74);
    expect($fooBar->print())->toEqual("FooQix4");
});
test("Return Bar if number given is a multiple of 5, then append Bar if number given contains 5", function () {
    $fooBar = new FooBar(45);
    expect($fooBar->print())->toEqual("Bar4Bar");
});
test("Return Foo if number given is a multiple of 5, then append Foo if number given contains 3", function () {
    $fooBar = new FooBar(33);
    expect($fooBar->print())->toEqual("FooFooFoo");
});
test("Return Qix if number given is a multiple of 7, then append FooBar if number given contains 3 and 5", function () {
    $fooBar = new FooBar(35);
    expect($fooBar->print())->toEqual("QixFooBar");
});


// new InfQixFoo implementation

test("Return Inf if number given is a multiple of 8", function () {
    $fooBar = new FooBar(24);
    expect($fooBar->print())->toEqual("Inf");
});
test("Return InfQixFoo if number given is a multiple of 8 and 7 and 3", function () {
    $fooBar = new FooBar(56);
    expect($fooBar->print())->toEqual("Inf;Qix;Foo");
});
test("Return InfQixFoo if number given is NOT a multiple of 8 and 7 and 3 but contains said numbers", function () {
    $fooBar = new FooBar(873);
    expect($fooBar->print())->toEqual("Inf;Qix;Foo");
});
test("If sum of all digits is a multiple of 8, append Inf at the end of response", function () {
    $fooBar = new FooBar(88);
    expect($fooBar->print())->toEqual("InfInf");
});

