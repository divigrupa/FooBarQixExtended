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
final class FooBarQix
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
    private array $_changeMap = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];

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
    private string $_separator = ', ';

    /**
     * Constructor
     *
     * @param integer|string $input A positive integer (may be provided as a
     *                              string)
     */
    public function __construct($input, $changeMap = [], $separator = null)
    {
        // Initialise properties
        $this->_input = $input;
        $this->_changeMap = $changeMap ?: $this->_changeMap;
        $this->_separator = $separator ?: $this->_separator;

        // Process the input
        $this->_validateInput();
        $this->_output = implode(
            $this->_separator,
            array_filter(
                [$this->_checkMultipliers(), $this->_checkOccurrences()],
                'strlen'  // To remove empty strings from the array
                // https://www.php.net/manual/en/function.array-filter.php#111091
            )
        );
    }

    /**
     * Check if the input integer is divisible by Foo, Bar or Qix
     *
     * @return string The transformed input
     */
    final private function _checkMultipliers(): string
    {
        $detectionValues = array_keys($this->_changeMap);
        $output = (string) $this->_input;

        // Get combinations of `$changeMap` keys of length starting from count
        // of items in the array `$changeMap`.
        for ($count = count($this->_changeMap); $count > 0; $count --) {
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
                        $this->_separator,
                        array_intersect_key(
                            $this->_changeMap,
                            array_combine($combination, $combination)
                        )
                    );

                    // The largest possible combination of multipliers has been
                    // found, stop both loops.
                    break 2;
                }
            }
        }

        return $output;
    }

    /**
     * Check if the input has occurences of `$changeMap` keys
     *
     * For each occurence the corresponding `$changeMap` value is added to the
     * ouput in the occurring order.
     *
     * @return string The transformed input
     */
    final private function _checkOccurrences(): string
    {
        $output = '';

        foreach ($this->inputDigitsAsArray() as $digit) {
            if (array_key_exists($digit, $this->_changeMap)) {
                $output .= ($output ? $this->_separator : '')
                    . $this->_changeMap[$digit];
            }
        }

        return $output;
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
    final private function _validateInput(): void
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
    final public function inputDigitsAsArray(): array
    {
        return array_map('intval', str_split((string) $this->_input));
    }

    /**
     * String representation of an object
     *
     * @return string
     */
    final public function __toString(): string
    {
        return $this->_output;
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
    final public static function process($input): string
    {
        return (string) new static($input);
    }
}
