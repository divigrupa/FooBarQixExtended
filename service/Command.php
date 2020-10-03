<?php declare(strict_types=1);
require_once 'vendor/autoload.php';

/**
 * Process an input to provide an output based on characteristics of the input
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 *
 * @codeCoverageIgnore
 */
final class Command
{
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
    final public static function transform($argc, $argv)
    {
        $result = null;

        if ($argc) {
            if ($argc < 3) {
                throw new InvalidArgumentException(
                    "Please provide two arguments - a valid class name and "
                        . "a positive integer!"
                );
            } else if (! is_string($argv[1])) {
                throw new InvalidArgumentException(
                    "\"{$argv[1]}\" is not a string. Please provide a valid "
                        . "class name!"
                );
            } else if (! class_exists($argv[1])) {
                throw new InvalidArgumentException(
                    "The class `{$argv[1]}` does not exist. "
                        . "Please provide a valid class name!"
                );
            }

            $result = $argv[1]::process($argv[2]);

            echo $result . PHP_EOL;
        }

        return $result;
    }

}

Command::transform($argc, $argv);
