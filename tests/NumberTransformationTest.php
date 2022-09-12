<?php

use App\FooBarQix;
use App\InfQixFoo;
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

// InfQixFoo service

test("Should return Inf in case if multiple by 8",
    function (){
        $step1 = new InfQixFoo();
        expect($step1->execute(8))->toEqual("Inf");
        expect($step1->execute(16))->toEqual("Inf");
});

test(" Should return Qix in case if multiple by 7",
    function (){
        $step1 = new InfQixFoo();
        expect($step1->execute(7))->toEqual("Qix");
        expect($step1->execute(14))->toEqual("Qix");
    });

test(" Should return Foo in case if multiple by 3",
    function (){
        $step1 = new InfQixFoo();
        expect($step1->execute(3))->toEqual("Foo");
        expect($step1->execute(4))->toEqual("4");
    });
test("Should return Inf;Qix;Foo in case of multiple by 8 and 7 and 3",
    function (){
        $step1 = new InfQixFoo();
        expect($step1->execute(56))->toEqual("Inf;Qix");
        expect($step1->execute(224))->toEqual("Inf;Qix");
        expect($step1->execute(168))->toEqual("Inf;Qix;Foo");
    });
test("Should return Inf;Qix,Foo in case if number is not multiple to 8,7,3 and contains digit 8,7,3 in it",
    function (){
        $step1 = new InfQixFoo();
        expect($step1->execute(82))->toEqual("Inf");
        expect($step1->execute(74))->toEqual("Qix");
        expect($step1->execute(34))->toEqual("Foo");
        expect($step1->execute(3587))->toEqual("Foo;Inf;Qix");
        expect($step1->execute(7853))->toEqual("Qix;Inf;Foo");
    });

test("If sum of all digits is multiple of 8, we will append “Inf” at the very and of response",
    function (){
        $step1 = new InfQixFoo();
        expect($step1->execute(8))->toEqual("InfInf");
    });