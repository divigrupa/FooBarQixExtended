<?php

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
    return $result;
}

function occurrencesTransformation($number) {
    $result = '';
    $digits = str_split((string)$number);
    foreach ($digits as $digit) {
        if ($digit == 3) {
            $result .= 'Foo';
        } elseif ($digit == 5) {
            $result .= 'Bar';
        } elseif ($digit == 7) {
            $result .= 'Qix';
        }
    }
    return $result;
}

function infqixfoo($number) {
    $multiplesResult = multiplesTransformation($number);
    $occurrencesResult = occurrencesTransformation($number);
    $sumOfDigits = array_sum(str_split((string)$number));

    $result = $multiplesResult . $occurrencesResult;

    if ($sumOfDigits % 8 === 0) {
        $result .= 'Inf';
    }

    return $result ? $result : (string)$number;
}

echo "Please enter a positive integer:";
$number = strtolower(trim(fgets(STDIN)));

if (!ctype_digit($number) || $number <= 0) {
    echo "Invalid input. Please enter a positive integer." . PHP_EOL;
    exit;
}

$result = infqixfoo($number);
echo $result . PHP_EOL;