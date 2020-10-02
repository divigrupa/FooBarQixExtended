<?php declare(strict_types=1);
require_once 'vendor/autoload.php';

/**
 * Process an input to provide an output based on characteristics of the input
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 */
final class InfQixFoo extends FooBarQix
{
    protected array $changeMap = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];

    /**
     * An integer to check if the sum of input digits is divisible by.
     *
     * @var integer
     */
    private $_divisor = 8;

    protected string $separator = '; ';

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
        if (array_sum($this->inputDigitsAsArray()) % $this->_divisor === 0) {
            $this->output .= isset($this->changeMap[$this->_divisor])
                ? $this->changeMap[$this->_divisor]
                : (string) $this->_divisor;
        }
    }

}

InfQixFoo::command($argc, $argv);
