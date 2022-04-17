<?php


use App\FooBarQix;

// step1
test('return value is string of the input number', function ($number) {
$conditions = [3 => 'Foo', 5 => 'Bar'];
$testObject = new FooBarQix($conditions);
expect($testObject->multiple($number))->toBe("$number");
})->with([4, 8, 13, 29, 47]);

test('if multiple of 3, return value is Foo', function ($number) {
$conditions = [3 => 'Foo', 5 => 'Bar'];
$testObject = new FooBarQix($conditions);;
expect($testObject->multiple($number))->toBe('Foo');
})->with([3, 9, 21, 48, 81]);

test('if multiple of 5, return value is Bar', function ($number) {
$conditions = [3 => 'Foo', 5 => 'Bar'];
$testObject = new FooBarQix($conditions);
expect($testObject->multiple($number))->toBe('Bar');
})->with([5, 20, 35, 55, 110]);

test('if multiple of 3/5, return value is "Foo, Bar"', function ($number) {
$conditions = [3 => 'Foo', 5 => 'Bar'];
$testObject = new FooBarQix($conditions);
expect($testObject->multiple($number))->toBe('Foo, Bar');
})->with([15, 30, 60, 90, 120]);

// step2
test('if multiple of 7, return value is Qix', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);;
    expect($testObject->multiple($number))->toBe('Qix');
})->with([7, 14, 28, 91, 98]);

test('if multiple of 3/5/7, return value is "Foo, Bar, Qix"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multiple($number))->toBe('Foo, Bar, Qix');
})->with([105, 210, 315, 420, 525]);

// validate input
it('wrong input, returns exception', function ($number) {
    $conditions = [3 => 'Foo', 7 => 'Qix', 8 => 'Inf'];
    $testObject = new FooBarQix($conditions);
    $testObject->validate($number);
})->with(['4', -14, -51, 'A', "Hello!"])
    ->throws(InvalidArgumentException::class);

// step3
it('contains 3, returns Foo', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);;
    expect($testObject->numberOccurrence($number))->toBe('Foo');
})->with([3, 63, 348, 9831, 63481]);

it('contains 5, returns Bar', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->numberOccurrence($number))->toBe('Bar');
})->with([5, 45, 952, 4589, 12456]);

it('contains 7, returns Qix', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);;
    expect($testObject->numberOccurrence($number))->toBe('Qix');
})->with([7, 74, 278, 9871, 72498]);

test('if multiple of 3 and contains 3, returns "Foo, Foo"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Foo, Foo');
})->with([3, 36, 348, 9831, 63486]);

test('if multiple of 5 and contains 5, returns "Bar, Bar"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Bar, Bar');
})->with([5, 50, 950, 4580, 14450]);

test('if multiple of 7 and contains 7, returns "Qix, Qix"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Qix, Qix');
})->with([7, 217, 427, 679, 1078]);

test('if multiple of 3/5 and contains 3/5, returns "Foo, Bar, Foo, Bar"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Foo, Bar, Foo, Bar');
})->with([135, 345, 435, 1035, 1305]);

test('if multiple of 3/7 and contains 3/7, returns "Foo, Qix, Foo, Qix"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Foo, Qix, Foo, Qix');
})->with([273, 378, 1743, 2037, 3087]);

test('if multiple of 5/7 and contains 5/7, returns "Bar, Qix, Bar, Qix"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Bar, Qix, Bar, Qix');
})->with([175, 875, 1715, 2275, 4725]);

test('if multiple of 3/5/7 and contains 3/5/7, returns "Foo, Bar, Qix, Foo, Bar, Qix"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Foo, Bar, Qix, Foo, Bar, Qix');
})->with([3570, 30576, 35070, 35700, 135870]);

test('if multiple of 3/5/7 and contains 3/7/5, returns "Foo, Bar, Qix, Foo, Qix, Bar"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Foo, Bar, Qix, Foo, Qix, Bar');
})->with([3675, 18375, 30765, 30975, 36750]);

test('if multiple of 3/5/7 and contains 5/3/7, returns "Foo, Bar, Qix, Bar, Foo, Qix"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Foo, Bar, Qix, Bar, Foo, Qix');
})->with([53760, 53970, 125370, 153720, 253470]);

test('if multiple of 3/5/7 and contains 5/7/3, returns "Foo, Bar, Qix, Bar, Qix, Foo"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Foo, Bar, Qix, Bar, Qix, Foo');
})->with([65730, 254730, 457380, 485730, 548730]);

test('if multiple of 3/5/7 and contains 7/3/5, returns "Foo, Bar, Qix, Qix, Foo, Bar"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Foo, Bar, Qix, Qix, Foo, Bar');
})->with([735, 7035, 7350, 42735, 67305]);

test('if multiple of 3/5/7 and contains 7/5/3, returns "Foo, Bar, Qix, Qix, Bar, Foo"', function ($number) {
    $conditions = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
    $testObject = new FooBarQix($conditions);
    expect($testObject->multipleNumberOccurrence($number))->toBe('Foo, Bar, Qix, Qix, Bar, Foo');
})->with([75390, 187530, 275310, 475230, 705390]);



