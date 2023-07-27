<?php

use App\Exceptions\PositiveNumberException;
use App\Validators\InputValidator;
use PHPUnit\Framework\TestCase;

class InputValidatorTest extends TestCase
{
    private InputValidator $validator;
    protected function setUp(): void
    {
        $this->validator = new InputValidator();
    }
    public function testValidInput()
    {
        $this->validator = new InputValidator();
        $this->assertEquals(1, $this->validator->validate(1)->getInput());
        $this->assertEquals(1991, $this->validator->validate(1991)->getInput());
    }

    public function testInvalidInput()
    {
        $this->expectException(PositiveNumberException::class);
        $this->expectExceptionMessage('Only Positive Integer Numbers are Accepted!');

        $this->validator->validate(-1);
        $this->validator->validate(0);
        $this->validator->validate(1.1);
        $this->validator->validate('stringMessage');
    }
}