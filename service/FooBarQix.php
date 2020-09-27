<?php declare(strict_types=1);

/**
 * Process an input to provide an output based on charasteristics of the input
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 */
class FooBarQix
{
    /**
     * The input value that should be a positive integer
     *
     * @var integer|string
     */
    private $_input;

    /**
     * Values mapping
     *
     * An array of values mapping between properties `$intA` and `$strA`,
     * `$intB` and `$strB`, `$intC` and `$strC`.
     *
     * @var array
     */
    private $_valuesMap;

    /**
     * The first multiplier and occurrence integer
     *
     * @var integer
     */
    protected $intA = 3;

    /**
     * The second multiplier and occurrence integer
     *
     * @var integer|string
     */
    protected $intB = 5;

    /**
     * The third multiplier and occurrence integer
     *
     * @var integer|string
     */
    protected $intC = 7;

    /**
     * A string that shows if the input has certain characteristics
     *
     * @var string
     */
    protected $output;

    /**
     * A string to glue together output parts
     *
     * @var string
     */
    protected $separator = ', ';

    /**
     * String representation of the property `$intA`
     *
     * @var string
     */
    protected $strA = "Foo";

    /**
     * String representation of the property `$intB`
     *
     * @var string
     */
    protected $strB = "Bar";

    /**
     * String representation of the property `$intC`
     *
     * @var string
     */
    protected $strC = "Qix";

    /**
     * Constructor
     *
     * @param integer|string $input A positive integer (may be provided as a
     *                              string)
     */
    protected function __construct($input)
    {
        // Initialise properties
        $this->_input = $input;
        $this->_valuesMap = [
            $this->intA => $this->strA,
            $this->intB => $this->strB,
            $this->intC => $this->strC
        ];

        // Process the input
        $this->_validateInput();
        $this->_checkMultipliers();
        $this->_checkOccurrences();
    }

    /**
     * Check if the input integer is divisible by Foo, Bar or Qix
     *
     * @return void
     */
    private function _checkMultipliers(): void
    {
        $intABMultiplier = $this->intA * $this->intB;
        $output = (string) $this->_input;

        if ($this->_input % ($intABMultiplier * $this->intC) === 0) {
            $output = implode($this->separator, $this->_valuesMap);
        } else if ($this->_input % $intABMultiplier === 0) {
            $output = "{$this->strA}{$this->separator}{$this->strB}";
        } else if ($this->_input % ($this->intA * $this->intC) === 0) {
            $output = "{$this->strA}{$this->separator}{$this->strC}";
        } else if ($this->_input % ($this->intB * $this->intC) === 0) {
            $output = "{$this->strB}{$this->separator}{$this->strC}";
        } else if ($this->_input % $this->intA === 0) {
            $output = $this->strA;
        } else if ($this->_input % $this->intB === 0) {
            $output = $this->strB;
        } else if ($this->_input % $this->intC === 0) {
            $output = $this->strC;
        }

        $this->output = $output;
    }

    /**
     * Check if the input has occurences of `$intA`, `$intB` or `$intC`
     *
     * For each occurence the corresponding value of `$strA`, `$strB` or
     * `$strC` is added to the ouput in the occurring order.
     *
     * @return void
     */
    private function _checkOccurrences(): void
    {
        $output = $this->output;

        foreach ($this->inputDigitsAsArray() as $digit) {
            if (array_key_exists($digit, $this->_valuesMap)) {
                $output .= "{$this->separator}{$this->_valuesMap[$digit]}";
            }
        }

        $this->output = $output;
    }

    /**
     * Validate the input
     *
     * A valid input is positive integer (may be provided as a string as well).
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function _validateInput(): void
    {
        $validatedInput = filter_var(
            $this->_input,
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 1]]
        );

        if ($validatedInput === false) {
            throw new InvalidArgumentException(
                sprintf("\"%s\" is not a positive integer!", $this->_input)
            );
        }

        $this->_input = $validatedInput;
    }

    /**
     * Get an array whose values are digits of the input integer
     *
     * @return array
     */
    protected function inputDigitsAsArray(): array
    {
        return array_map('intval', str_split((string) $this->_input));
    }

    /**
     * String representation of an object
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->output;
    }

    /**
     * Process the input value that is provided from the command line
     *
     * @param integer $argc The number of arguments passed to the script
     *                      {@link
     *                      https://www.php.net/manual/en/reserved.variables.argc.php
     *                      `$argc`}
     * @param array   $argv An array of arguments passed to the script
     *                      {@link
     *                      https://www.php.net/manual/en/reserved.variables.argv.php
     *                      `$argv`}
     *
     * @return void
     */
    public static function command($argc, $argv)
    {
        if ($argc) {
            echo (
                $argc < 2
                    ? "Please provide one argument that is a positive integer!"
                    : static::process($argv[1])
            ) . PHP_EOL;
        }
    }

    /**
     * Detect if the input has certain characteristics and transform it
     *
     * Transform input if it is divisible by `$intA`, `$intB` or `$intC`;
     * output for the each of multipliers are value of `$strA`, `$strB` and
     * `$strC` respectively in ascending order.
     * Then the input should be checked if the provided integer contains
     * `$intA`, `$intB` or `$intC`. For each occurence value of `$strA`,
     * `$strB` and `$strC` respectively should be added to the output in the
     * occurring order.
     * Output the provided integer as a string if it neither is divisible by
     * `$intA`, `$intB` and `$intC` nor it contains `$intA`, `$intB` or
     * `$intC`.
     *
     * @param integer|string $input A positive integer (may be provided as a
     *                              string)
     *
     * @return string
     */
    public static function process($input): string
    {
        return (string) new static($input);
    }
}

FooBarQix::command($argc, $argv);
