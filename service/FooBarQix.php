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
    private $_barMultiplier = 5;

    /**
     * A multiplier to detect if the input is Foo
     *
     * @var integer
     */
    private $_fooMultiplier = 3;

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
     * Constructor
     *
     * @param integer|string $input A positive integer (may be provided as a
     *                              string)
     */
    private function __construct($input)
    {
        $this->_input = $input;
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

        if ($this->_input % ($this->_fooMultiplier * $this->_barMultiplier) === 0) {
            $output = "Foo, Bar";
        } else if ($this->_input % $this->_fooMultiplier === 0) {
            $output = "Foo";
        } else if ($this->_input % $this->_barMultiplier ===0) {
            $output = "Bar";
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
     * Transform input to "Foo" if it is divisible by `$_fooMultiplier`.
     * Transform input to "Bar" if it is divisible by `$_barMultiplier`.
     * Transform input to "Foo, Bar" if it is divisble by both
     * `$_fooMultiplier` and `$_barMultiplier`.
     * Output the provided integer as a string if it is divisible neither by
     * `$_fooMultiplier` nor `$_barMultiplier`.
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
