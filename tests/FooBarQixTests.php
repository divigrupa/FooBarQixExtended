<?php
namespace tests;

use App\Models\Condition;
use App\Models\Application;
use App\Models\Input;
use PHPUnit\Framework\TestCase;

class FooBarQixTests extends TestCase {

    public function testInputIsPositiveInteger() {
        $input = new Input(10);
        $result = $input->checkIfPositiveInteger();

        $inputTwo = new Input(-10);
        $resultTwo = $inputTwo->checkIfPositiveInteger();

        $this->assertEquals(true, $result);
        $this->assertEquals(false, $resultTwo);
    }

    public function testResultMultipleFoo() {
        $input = new Input(9);
        $conditions = [new Condition(3, "Foo")];

        $application = new Application($input, $conditions);

        $application->verificationForMultiple();

        $this->assertEquals('Foo', $application->getResult());
    }

    public function testResultMultipleBar() {
        $input = new Input(20);
        $conditions = [new Condition(5, "Bar")];

        $application = new Application($input, $conditions);

        $application->verificationForMultiple();

        $this->assertEquals('Bar', $application->getResult());
    }

    public function testResultMultipleQix() {
        $input = new Input(7);
        $conditions = [new Condition(7, "Qix")];

        $application = new Application($input, $conditions);

        $application->verificationForMultiple();

        $this->assertEquals('Qix', $application->getResult());
    }

    public function testResultForAllConditions() {
        $input = new Input(105);
        $conditions = [
            new Condition(3, "Foo"),
            new Condition(5, "Bar"),
            new Condition(7, "Qix")
        ];

        $application = new Application($input, $conditions);

        $application->verificationForMultiple();

        $this->assertEquals('Foo, Bar, Qix', $application->getResult());
    }

    public function testReturnedValueIsString() {
        $input = new Input(13);
        $conditions = [
            new Condition(3, "Foo"),
            new Condition(5, "Bar"),
            new Condition(7, "Qix")
        ];

        $application = new Application($input, $conditions);

        $application->verificationForMultiple();

        $this->assertIsString($application->getResult());
        $this->assertEquals('13', $application->getResult());
    }

}