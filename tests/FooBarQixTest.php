<?php

use App\FooBarQix;

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

test("Should return FooBarQix in case of multiple by 3 and 5 and 7",
    function () {
        $step1 = new FooBarQix();
        expect($step1->execute(15))->toEqual("Foo,Bar");
        expect($step1->execute(45))->toEqual("Foo,Bar");
        expect($step1->execute(105))->toEqual("Foo,Bar,Qix");
    });
test("Should return Qix in case of multiple by 7",
    function () {
        $step1 = new FooBarQix();
        expect($step1->execute(7))->toEqual("Qix");
        expect($step1->execute(14))->toEqual("Qix");
    });
test("Should return Foo,Bar,Qix in case if number is not multiple to 3,5,7 and contains digit 3,5,7 in it",
    function (){
        $step1 = new FooBarQix();
        expect($step1->execute(34))->toEqual("Foo");
        expect($step1->execute(52))->toEqual("Bar");
        expect($step1->execute(74))->toEqual("Qix");
        expect($step1->execute(1234567))->toEqual("Foo,Bar,Qix");
        expect($step1->execute(7654321))->toEqual("Qix,Bar,Foo");
    });
