<?php declare(strict_types=1);

use App\Service\FooBarService;
use App\Service\InfQixFooService;
use App\Service\NumberProcessor;

require_once __DIR__ . '/vendor/autoload.php';

$processor = new NumberProcessor(FooBarService::getConfig());
$fooService = new FooBarService($processor);
echo $fooService->execute(77535) . '</br>';


$processor = new NumberProcessor(InfQixFooService::getConfig());
$infService = new InfQixFooService($processor);
echo $infService->execute(4488);
