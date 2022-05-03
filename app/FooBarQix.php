<?php

namespace App;

class FooBarQix extends FooBarQixInf
{
    protected array $multiplesAndOccurrences = [
        "Foo" => 3,
        "Bar" => 5,
        "Qix" => 7
    ];

    protected string $separator = ', ';
}