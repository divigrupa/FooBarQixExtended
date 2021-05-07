<?php declare(strict_types=1);

use App\Service\EqualService;
use App\Service\MultipleEqualService;
use App\Service\MultipleService;

require_once 'vendor/autoload.php';

$readline = readline('Enter your number: ');
$case = readline('Enter 1 for Multiple:' . PHP_EOL . 'Enter 2 for Equal:' . PHP_EOL . 'Enter 3 for Multiple-Equal: ' . PHP_EOL);
$num = intval($readline);

switch ($case) {
    case 1:
        for ($i = 1; $i <= $num; $i++) {

            $isMultiple = new MultipleService();
            echo $isMultiple->isMultiple($i);

            echo PHP_EOL;
        }
        break;
    case 2:
        for ($i = 1; $i <= $num; $i++) {
            $isEqual = new EqualService();
            echo $isEqual->isEqual($i);
            echo PHP_EOL;
        }
        break;
    case 3:
        for ($i = 1; $i <= $num; $i++) {
            $isEqual = new MultipleEqualService();
            echo $isEqual->isMultipleEqual($i);
            echo PHP_EOL;
        }
        break;
}
