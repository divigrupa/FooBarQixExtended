<?php

namespace App;

class InfQixFoo extends FooBarQixInf
{
    protected array $multiplesAndOccurrences = [
        "Inf" => 8,
        "Qix" => 7,
        "Foo" => 3,
    ];

    protected string $separator = '; ';
}