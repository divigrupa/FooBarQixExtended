<?php


use App\FooBarQix;

// step1
test('return value is string of the input number', function ($number) {
$conditions = [3 => 'Foo', 5 => 'Bar'];
$testObject = new FooBarQix($conditions);
expect($testObject->multiple($number))->toBe("$number");
})->with([4, 8, 13, 29, 47]);

test('if multiple, return value is Foo', function ($number) {
$conditions = [3 => 'Foo', 5 => 'Bar'];
$testObject = new FooBarQix($conditions);;
expect($testObject->multiple($number))->toBe('Foo');
})->with([3, 9, 21, 48, 81]);

test('if multiple, return value is Bar', function ($number) {
$conditions = [3 => 'Foo', 5 => 'Bar'];
$testObject = new FooBarQix($conditions);
expect($testObject->multiple($number))->toBe('Bar');
})->with([5, 20, 35, 55, 110]);

test('if multiple, return value is "Foo, Bar"', function ($number) {
$conditions = [3 => 'Foo', 5 => 'Bar'];
$testObject = new FooBarQix($conditions);
expect($testObject->multiple($number))->toBe('Foo, Bar');
})->with([15, 30, 60, 90, 120]);
