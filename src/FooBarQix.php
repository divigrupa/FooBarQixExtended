<?php

namespace App;

class FooBarQix
{
    public function answer($number)
    {
        if ($number % 105 === 0) {
            return "Foo, Bar, Qix";
        }
        if ($number % 15 === 0) {
            return "Foo, Bar";
        }
        if ($number % 7 === 0) {
            return "Qix";
        }
        if ($number % 5 === 0) {
            return "Bar";
        }
        if ($number % 3 === 0) {
            return "Foo";
        }

        return $number;
    }
}