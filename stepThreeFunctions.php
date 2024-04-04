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
        $result .= 'Foo';
    }

    if ($number % 5 === 0) {
        $result .= 'Bar';
    }

    if ($number % 7 === 0) {
        $result .= 'Qix';
    }

    return $result ? $result : (string)$number;
}

function occurrencesTransformation($number) {
    $result = '';

    $digits = str_split((string)$number);
    foreach ($digits as $digit) {
        switch ($digit) {
            case '3':
                $result .= 'Foo';
                break;
            case '5':
                $result .= 'Bar';
                break;
            case '7':
                $result .= 'Qix';
                break;
        }
    }

    return $result;
}

function foobarqix($number) {
    $multiplesResult = multiplesTransformation($number);
    $occurrencesResult = occurrencesTransformation($number);

    return $multiplesResult . $occurrencesResult;
}
