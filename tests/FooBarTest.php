<?php

use App\Element;
use App\NumberTransformation;

test(
    'return "Foo" if this number is multiple of 3,
    "Bar" if this number is multiple of 5,
    "FooBar" if this number is multiple of 3 and 5,
    else return number as string'
    , function () {
    $elements=[
        $foo=new Element('Foo',3),
        $bar=new Element('Bar',5)
    ];

    $function = new NumberTransformation($elements);
    expect($function->execute(3))->toBe('Foo') ;
    expect($function->execute(5))->toBe('Bar');
    expect($function->execute(6))->toBe('Foo');
    expect($function->execute(15))->toBe('Foo,Bar');
    expect($function->execute(8))->toBe('8');
});

