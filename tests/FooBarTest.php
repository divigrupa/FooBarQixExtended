<?php

test(
    'return "Foo" if this number is multiple of 3,
    "Bar" if this number is multiple of 5,
    "FooBar" if this number is multiple of 3 and 5,
    else return number as string'
    , function () {
    $function = new fooBar();
    expect($function->execute(3))->toBe('Foo') ;
    expect($function->execute(5))->toBe('Bar');
    expect($function->execute(6))->toBe('Foo');
    expect($function->execute(15))->toBe('Foo,Bar');
    expect($function->execute(8))->toBe('8');
});
