<?php declare(strict_types=1);
require_once 'vendor/autoload.php';

use \drupol\phpermutations\Generators\Combinations;

/**
 * Process an input to provide an output based on charasteristics of the input
 *
 * Input should be transformed if it has certain characteristics (for example,
 * it is divisible by or it contains specific integers etc.).
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 */
class FooBarQix
{
    /**
     * The input value that should be a positive integer
     *
     * The input integer may be provided as a string as well.
     *
     * @var integer|string
     */
    private $_input;

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
    protected array $changeMap = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];

    /**
     * A string that shows if the input has certain characteristics
     *
     * @var string
     */
    protected string $output;

    /**
     * A string that is used sto join together output parts
     *
     * @var string
     */
    protected string $separator = ', ';

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
        $detectionValues = array_keys($this->changeMap);
        $output = (string) $this->_input;

        // Get combinations of `$changeMap` keys of length starting from count
        // of items in the array `$changeMap`.
        for ($count = count($this->changeMap); $count > 0; $count --) {
            $combinations = new Combinations($detectionValues, $count);

            foreach ($combinations->generator() as $combination) {
                // Check if the input is divisible by the product of the
                // current combination's members.
                if ($this->_input % array_product($combination) === 0) {
                    // If the input is divisible by all members of
                    // `$combination`, output is generated from the values of
                    // `$changeMap` whose keys are the same as the numbers in
                    // the current combination.
                    // Output parts are glued together using `$separator` in
                    // the order they are provided in `$changeMap`.
                    $output = implode(
                        $this->separator,
                        array_intersect_key(
                            $this->changeMap,
                            array_combine($combination, $combination)
                        )
                    );

                    // The largest possible combination of multipliers has been
                    // found, stop both loops.
                    break 2;
                }
            }
        }

        $this->output = $output;
    }

    /**
     * Check if the input has occurences of `$changeMap` keys
     *
     * For each occurence the corresponding `$changeMap` value is added to the
     * ouput in the occurring order.
     *
     * @return void
     */
    private function _checkOccurrences(): void
    {
        $output = $this->output;

        foreach ($this->inputDigitsAsArray() as $digit) {
            if (array_key_exists($digit, $this->changeMap)) {
                $output .= "{$this->separator}{$this->changeMap[$digit]}";
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
     *
     * @codeCoverageIgnore
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
     * Transform input if it is divisible by keys of `$changeMap`;
     * output for the each of multipliers are value of `$strA`, `$strB` and
     * `$strC` respectively in ascending order.
     * Then the input should be checked if the provided integer contains any
     * key of $changeMap. For each occurence the corresponding value is added
     * to the output in the occurring order.
     * Output the provided integer as a string if it neither is divisible by
     * nor it contains keys of `$changeMap`.
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
