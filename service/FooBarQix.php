<?php declare(strict_types=1);

/**
 * Process an input to provide an output based on
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 */
final class FooBarQix
{
    /**
     * A multiplier to detect if the input is Bar
     *
     * @var integer
     */
    private $_bar = 5;

    /**
     * A multiplier to detect if the input is Foo
     *
     * @var integer
     */
    private $_foo = 3;

    /**
     * The input value that should be a positive integer
     *
     * @var integer|string
     */
    private $_input;

    /**
     * A string that shows if the input has certain characteristics
     *
     * @var string
     */
    private $_output;

    /**
     * A multiplier to detect if the input is Qix
     *
     * @var integer
     */
    private $_qix = 7;

    /**
     * Values mapping
     *
     * Keys are value of `$_foo`, `$_bar` and `$_qix` and values are string
     * representation of them.
     *
     * @var array
     */
    private $_valuesMap;

    /**
     * Constructor
     *
     * @param integer|string $input A positive integer (may be provided as a
     *                              string)
     */
    private function __construct($input)
    {
        // Initialise properties
        $this->_input = $input;
        $this->_valuesMap = [
            $this->_foo => "Foo", $this->_bar => "Bar", $this->_qix => "Qix"
        ];

        // Process the input
        $this->_validateInput();
        $this->_processInput();
    }

    /**
     * Check if the input integer has certain characteristics
     *
     * @return void
     */
    private function _processInput(): void
    {
        $output = (string)$this->_input;
        $fooBarMultiplier = $this->_foo * $this->_bar;
        $strBar = $this->_valuesMap[$this->_bar];
        $strFoo = $this->_valuesMap[$this->_foo];
        $strQix = $this->_valuesMap[$this->_qix];

        if ($this->_input % ($fooBarMultiplier * $this->_qix) === 0) {
            $output = implode(", ", $this->_valuesMap);
        } else if ($this->_input % $fooBarMultiplier === 0) {
            $output = "{$strFoo}, {$strBar}";
        } else if ($this->_input % ($this->_foo * $this->_qix) === 0) {
            $output = "{$strFoo}, {$strQix}";
        } else if ($this->_input % ($this->_bar * $this->_qix) === 0) {
            $output = "{$strBar}, {$strQix}";
        } else if ($this->_input % $this->_foo === 0) {
            $output = $strFoo;
        } else if ($this->_input % $this->_bar === 0) {
            $output = $strBar;
        } else if ($this->_input % $this->_qix === 0) {
            $output = $strQix;
        }

        $this->_output = $output;
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
     * String representation of an object
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->_output;
    }

    /**
     * Detect if the input has certain characteristics
     *
     * Transform input to "Foo" if it is divisible by `$_foo`.
     * Transform input to "Bar" if it is divisible by `$_bar`.
     * Transform input to "Foo, Bar" if it is divisble by both `$_foo` and
     * `$_bar`.
     * Transform input to "Foo, Bar, Qix" if it is divisble by `$_foo`, `$_bar`
     * and `$_qix`.
     * Output the provided integer as a string if it is not divisible by
     * `$_foo`, `$_bar` and `$_qix`.
     *
     * @param integer|string $input A positive integer (may be provided as a
     *                              string)
     *
     * @return string
     */
    public static function process($input): string
    {
        return (string)new self($input);
    }
}

// Process a value that is provided from the command line
if ($argc) {
    echo (
        $argc < 2
            ? "Please provide one argument that is a positive integer!"
            : FooBarQix::process($argv[1])
    ) . PHP_EOL;
}
