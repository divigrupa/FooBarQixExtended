<?php

test("Should return Foo in case if multiple by 3",
    function () {
        $step1 = new FooBarQix();
        expect($step1->execute(3))->toEqual("Foo");
        expect($step1->execute(9))->toEqual("Foo");
    });

test("Should return Bar in case if multiple by 5",
    function () {

        $step1 = new FooBarQix();
        expect($step1->execute(10))->toEqual("Bar");
        expect($step1->execute(4))->toEqual("4");
    });

test("Should return FooBar in case of multiple by 3 and 5",
    function () {
        $step1 = new FooBarQix();
        expect($step1->execute(15))->toEqual("FooBar");
        expect($step1->execute(45))->toEqual("FooBar");
    });