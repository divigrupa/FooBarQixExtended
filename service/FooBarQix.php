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
        $this->_checkMultipliers();
        $this->_checkOccurences();
    }

    /**
     * Check if the input integer is divisible by Foo, Bar or Qix
     *
     * @return void
     */
    private function _checkMultipliers(): void
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
     * Check if the input integer has occurences of `$_foo`, `$_bar` or `$_qix`
     *
     * For each occurence "Foo", "Bar" or "Qix" is added to the ouptu in the
     * occurring order.
     *
     * @return void
     */
    private function _checkOccurences(): void
    {
        $output = $this->_output;

        foreach (
            array_map('intval', str_split((string) $this->_input)) as $digit
        ) {
            if (array_key_exists($digit, $this->_valuesMap)) {
                $output .= ", {$this->_valuesMap[$digit]}";
            }
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
     * Transform input if it is divisible by `$_foo`, `$_bar` or `$_qix` (
     * output value for the multipliers are "Foo", "Bar", "Qix" respectively);
     * if the integer has more than one multiplier, output for them should be
     * ordered in the same ascending order - "Foo", "Bar", "Qix".
     * Then the input should be checked if the provided integer contains
     * `$_foo`, `$_bar` or `$_qix`. For each occurence "Foo", "Bar" or "Qix"
     * respectively should be added to the output in the occurring order.
     * Output the provided integer as a string if it neither is divisible by
     * `$_foo`, `$_bar` and `$_qix` nor it contains `$_foo`, `$_bar` or
     * `$_qix`.
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
