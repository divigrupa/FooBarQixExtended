<?php declare(strict_types=1);
require_once 'vendor/autoload.php';

/**
 * Process an input to provide an output based on characteristics of the input
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 */
final class InfQixFoo extends FooBarQix
{
    protected $intA = 8;

    protected $intB = 7;

    protected $intC = 3;

    protected $separator = '; ';

    protected $strA = "Inf";

    protected $strB = "Qix";

    protected $strC = "Foo";
}

InfQixFoo::command($argc, $argv);
