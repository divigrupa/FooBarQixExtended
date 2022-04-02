<?php //declare(strict_types=1);
//
//require 'vendor/autoload.php';
//require 'app/ServiceFooBarQix.php';
//require 'app/ServiceInfQixFoo.php';
//
//use SebastianBergmann\CodeCoverage\Filter;
//use SebastianBergmann\CodeCoverage\Driver\Selector;
//use SebastianBergmann\CodeCoverage\CodeCoverage;
//use SebastianBergmann\CodeCoverage\Report\Html\Facade as HtmlReport;
//
//$filter = new Filter;
//$filter->includeFile('app/ServiceFooBarQix.php');
//$filter->includeFile('app/ServiceInfQixFoo.php');
//
//$coverage = new CodeCoverage(
//    (new Selector)->forLineCoverage($filter),
//    $filter
//);
//
//$coverage->start('Services');
//
//
//
//$coverage->stop();
//(new HtmlReport)->process($coverage, '/xml-coverage');
