<?php declare(strict_types=1);

/**
 * A test class to check if the class `Command` is working correctly
 *
 * @author Edgars Andersons <Edgars@gaitenis.id.lv>
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class CommandTest extends PHPUnit\Framework\TestCase
{
    /**
     * Hardoced value for `$argv[0]` that otherwise should be script name
     *
     * @var string
     */
    private string $_path = 'service/Command.php';

    /**
     * Test insufficien arguments count passed to the command
     *
     * @return void
     */
    public function testInsufficientArgumentsCountPassedToCommand(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "Please provide two arguments - a valid class name and a positive "
                . "integer!"
        );

        Command::transform(2, [$this->_path, 'FooBarQix']);
    }

    /**
     * Test an integer passed to the command as the first argument
     *
     * @return void
     */
    public function testClassNameAsAnIntegerPassedToCommand(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "\"3773\" is not a string. Please provide a valid class name!"
        );

        Command::transform(3, [$this->_path, 3773, '321']);
    }

    /**
     * Test invalid class name passed to the command as an argument
     *
     * @return void
     */
    public function testInvalidClassNamePassedToCommand(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "The class `FooBarqix` does not exist. Please provide a valid "
                . "class name!"
        );

        Command::transform(3, [$this->_path, 'FooBarqix', 33]);
    }

    /**
     * Test invalid input value passed to the command as an argument
     *
     * @return void
     */
    public function testInvalidInputValuePassedToCommand(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("\"azza\" is not a positive integer!");

        Command::transform(3, [$this->_path, 'FooBarQix', 'azza']);
    }

    /**
     * Test a valid input values passed to the command
     *
     * @return void
     */
    public function testValidInputValuesPassedToCommand(): void
    {
        $this->assertEquals(
            "Foo, Foo, Foo",
            Command::transform(3, [$this->_path, 'FooBarQix', 33])
        );
    }
}
