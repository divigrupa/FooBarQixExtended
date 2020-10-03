<?php declare(strict_types=1);
require_once 'vendor/autoload.php';

/**
 * Process an input to provide an output based on characteristics of the input
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 */
final class InfQixFoo
{
    /**
     * An array that defines what transformations should be made based on input
     *
     * Array's keys are integers that are used to determine characteristics of
     * the input and values are strings that should be added to the output if
     * the input has features based on the key integer.
     * Items in the array must be provided in the order their value should be
     * appended to the output if the input is divisible by them.
     *
     * @var array
     */
    private array $_changeMap = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];

    /**
     * An integer to check if the sum of input digits is divisible by
     *
     * Value of `$_divisor` **must** be one of `$_changeMap` key values.
     *
     * @var integer
     */
    private $_divisor = 8;

    /**
     * A string that shows if the input has certain characteristics
     *
     * @var string
     */
    private string $_output;

    /**
     * A string that is used sto join together output parts
     *
     * @var string
     */
    private string $_separator = '; ';

    /**
     * Constructor
     *
     * @param integer|string $input The input that should be transformed
     */
    final protected function __construct($input)
    {
        $this->_fooBarQix = new FooBarQix(
            $input,
            $this->_changeMap,
            $this->_separator
        );
        $this->_output = (string) $this->_fooBarQix
            . $this->_checkDivisibilityOfSumOfInputDigits();
    }

    /**
     * String representation of the object
     *
     * @return string
     */
    final public function __toString(): string
    {
        return $this->_output;
    }

    /**
     * Check if the sum of input integer's digits is divisible by `$intA`
     *
     * @return string The transformed output
     */
    final private function _checkDivisibilityOfSumOfInputDigits(): string
    {
        $output = '';
        $sumOfInputDigits = array_sum($this->_fooBarQix->inputDigitsAsArray());

        if ($sumOfInputDigits % $this->_divisor === 0) {
            $output .= ($output ? $this->_separator : '')
                . isset($this->_changeMap[$this->_divisor])
                    ? $this->_changeMap[$this->_divisor]
                    : (string) $this->_divisor;  // @codeCoverageIgnore
        }

        return $output;
    }

    /**
     * Make necessary transformations to the input
     *
     * @param integer|string $input The input to be processed
     *
     * @return string
     */
    final public static function process($input): string
    {
        return (string) new self($input);
    }
}
