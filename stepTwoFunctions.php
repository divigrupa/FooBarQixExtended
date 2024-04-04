<?php

echo "Please enter a positive integer:";
$number = strtolower(trim(fgets(STDIN)));

if (!ctype_digit($number) || $number <= 0) {
    echo "Invalid input. Please enter a positive integer." . PHP_EOL;
    exit;
}

function foobarqix($number) {
    if (!is_numeric($number) || $number <= 0 || strpos($number, '.') !== false) {
        return "Please provide a positive integer";
    }

    $result = '';

    if ($number % 3 === 0) {
        $result .= 'Foo';
    }

    if ($number % 5 === 0) {
        $result .= 'Bar';
    }

    if ($number % 7 === 0) {
        $result .= 'Qix';
    }

    if ($result === '') {
        return (string)$number;
    }

    return $result;
}