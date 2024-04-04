<?php

echo "Please enter a positive integer:";
$input = strtolower(trim(fgets(STDIN)));

if (!ctype_digit($input) || $input <= 0) {
    echo "Invalid input. Please enter a positive integer." . PHP_EOL;
    exit;
}

for ($i = 1; $i <= $input; $i++) {
    if ($i % 3 === 0) {
        echo "Foo";
    } elseif ($i % 5 === 0) {
        echo "Bar";
    } else {
        echo $i;
    }

    echo PHP_EOL; 
}
