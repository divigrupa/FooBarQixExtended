<?php

echo "Please enter a positive integer:";
$number = strtolower(trim(fgets(STDIN)));

if (!ctype_digit($number) || $number <= 0) {
    echo "Invalid input. Please enter a positive integer." . PHP_EOL;
    exit;
}

function multiplesTransformation($number) {
    $result = '';

    if ($number % 3 === 0) {
        $result .= 'Foo;';
    }

    if ($number % 7 === 0) {
        $result .= 'Qix;';
    }

    if ($number % 8 === 0) {
        $result .= 'Inf;';
    }

    return $result ? rtrim($result, ';') : '';
}

function occurrencesTransformation($number) {
    $result = '';

    $digits = str_split((string)$number);
    foreach ($digits as $digit) {
        switch ($digit) {
            case '3':
                $result .= 'Foo;';
                break;
            case '7':
                $result .= 'Qix;';
                break;
            case '8':
                $result .= 'Inf;';
                break;
        }
    }

    return rtrim($result, ';');
}

function infqixfoo($number) {
    $multiplesResult = multiplesTransformation($number);
    $occurrencesResult = occurrencesTransformation($number);

    $result = $multiplesResult . $occurrencesResult;

    return $result ? $result : (string)$number;
}