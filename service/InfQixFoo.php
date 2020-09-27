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

    protected function __construct($input)
    {
        parent::__construct($input);
        $this->_checkDivisibilityOfSumOfInputDigits();
    }

    /**
     * Check if the sum of input integer's digits is divisible by `$intA`
     *
     * @return void
     */
    private function _checkDivisibilityOfSumOfInputDigits(): void
    {
        if (array_sum($this->inputDigitsAsArray()) % $this->intA === 0) {
            $this->output .= $this->strA;
        }
    }

}

InfQixFoo::command($argc, $argv);
