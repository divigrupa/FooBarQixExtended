<?php


use App\InfQixFoo;

// validate input, output
it('returns exception', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    $testObject->getResult($number);
})->with(['4', -8, -51, 'A', "Hello!"])
    ->throws(InvalidArgumentException::class);

it('returns string', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("$number");
})->with([4, 11, 19, 29, 46]);

// testing for multiples, excluding occurrence
it('is multiple of 8, returns "Inf"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("Inf");
})->with([16, 40, 64, 104, 152]);

it('is multiple of 7, returns "Qix"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("Qix");
})->with([14, 49, 91, 119, 140]);

it('is multiple of 3, returns "Foo"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("Foo");
})->with([6, 9, 12, 15, 45]);

// testing for occurrence, excluding multiples
it('contains 8, returns "Inf"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("Inf");
})->with([58, 82, 148, 185, 428]);

it('contains 7, returns "Qix"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("Qix");
})->with([17, 67, 74, 127, 407]);

it('contains 3, returns "Foo"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("Foo");
})->with([13, 23, 103, 131, 341]);

it('contains 3/3/8/7, returns "Foo; Foo; Inf; Qix"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("Foo; Foo; Inf; Qix");
})->with([33287, 33487, 33871, 33847, 33875]);

it('contains 8/3/7/8, returns "Inf; Foo; Qix; Inf"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("Inf; Foo; Qix; Inf");
})->with([80378, 83578, 83708, 83780, 83789]);

it('contains 3/7/7/8, returns "Foo; Qix; Qix; Inf"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe("Foo; Qix; Qix; Inf");
})->with([30778, 34778, 37678, 37718, 37978]);

// looking for multiples and occurrence in the given number
it('is multiple of 8, contains 8, returns "Inf; Inf"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Inf; Inf');
})->with([128, 184, 208, 2584, 11080]);

it('is multiple of 7, contains 7, returns "Qix; Qix"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Qix; Qix');
})->with([7, 217, 427, 679, 9751]);

it('is multiple of 3, contains 3, returns "Foo; Foo"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Foo; Foo');
})->with([3, 36, 351, 6093, 9309]);

it('is multiple 8/7, contains 8/7, returns "Inf; Qix; Inf; Qix"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Inf; Qix; Inf; Qix');
})->with([8176, 8792, 11872, 18704, 87416]);

it('is multiple 8/3, contains 3/8, returns "Inf; Foo; Foo; Inf"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Inf; Foo; Foo; Inf');
})->with([384, 1368, 2328, 3048, 3648]);

it('is multiple 7/3, contains 3/7, returns "Qix; Foo; Foo; Qix"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Qix; Foo; Foo; Qix');
})->with([2037, 3297, 3507, 4347, 6237]);

it('is multiple of 8/7/3, contains 8/7/3, returns "Inf; Qix; Foo; Inf; Qix; Foo"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Inf; Qix; Foo; Inf; Qix; Foo');
})->with([8736, 87360, 187320, 281736, 857304]);

it('is multiple of 8/7/3, contains 8/3/7, returns "Inf; Qix; Foo; Inf; Foo; Qix"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Inf; Qix; Foo; Inf; Foo; Qix');
})->with([68376, 89376, 183792, 283752, 803712]);

it('is multiple of 8/7/3, contains 7/3/8, returns "Inf; Qix; Foo; Qix; Foo; Inf"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Inf; Qix; Foo; Qix; Foo; Inf');
})->with([73080, 73584, 703080, 27384, 67368]);

it('is multiple of 8/7/3, contains 7/8/3, returns "Inf; Qix; Foo; Qix; Inf; Foo"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Inf; Qix; Foo; Qix; Inf; Foo');
})->with([758352, 768432, 768936, 780360, 781536]);

it('is multiple of 8/7/3, contains 3/7/8, returns "Inf; Qix; Foo; Foo; Qix; Inf"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Inf; Qix; Foo; Foo; Qix; Inf');
})->with([35784, 37800, 37128, 37968, 137928]);

it('is multiple of 8/7/3, contains 3/8/7, returns "Inf; Qix; Foo; Foo; Inf; Qix"', function ($number) {
    $conditions = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
    $testObject = new InfQixFoo($conditions);
    expect($testObject->getResult($number))->toBe('Inf; Qix; Foo; Foo; Inf; Qix');
})->with([38472, 38976, 130872, 235872, 328272]);
