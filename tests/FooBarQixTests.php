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

        $application = new Application($input, ",", $conditions);

        $application->verificationForMultiple();

        $this->assertEquals('Foo', $application->getResult());
    }

    public function testResultMultipleBar() {
        $input = new Input(20);
        $conditions = [new Condition(5, "Bar")];

        $application = new Application($input, ",", $conditions);

        $application->verificationForMultiple();

        $this->assertEquals('Bar', $application->getResult());
    }

    public function testResultMultipleQix() {
        $input = new Input(7);
        $conditions = [new Condition(7, "Qix")];

        $application = new Application($input, ",", $conditions);

        $application->verificationForMultiple();

        $this->assertEquals('Qix', $application->getResult());
    }

    public function testResultContainsFoo() {
        $input = new Input(13);
        $conditions = [new Condition(3, "Foo")];

        $application = new Application($input, ",", $conditions);

        $application->verificationForContains($conditions);

        $this->assertEquals('13, Foo', $application->getResult());
    }

    public function testResultContainsBar() {
        $input = new Input(59);
        $conditions = [new Condition(5, "Bar")];

        $application = new Application($input, ",", $conditions);

        $application->verificationForContains($conditions);

        $this->assertEquals('59, Bar', $application->getResult());
    }

    public function testResultContainsQix() {
        $input = new Input(17);
        $conditions = [new Condition(7, "Qix")];

        $application = new Application($input, ",", $conditions);

        $application->verificationForContains($conditions);

        $this->assertEquals('17, Qix', $application->getResult());
    }

    public function testResultForAllConditions() {
        $input = new Input(105);
        $conditions = [
            new Condition(3, "Foo"),
            new Condition(5, "Bar"),
            new Condition(7, "Qix")
        ];

        $application = new Application($input, ",", $conditions);

        $application->verificationForMultiple();
        $application->verificationForContains($conditions);

        $this->assertEquals('Foo, Bar, Qix, Bar', $application->getResult());
    }

    public function testResultInfQixFooService() {
        $input = new Input(438);
        $conditionsForMultiples = [
            new Condition(8, "Inf"),
            new Condition(7, "Qix"),
            new Condition(3, "Foo")
        ];

        $conditionsForContains = [
            new Condition(3, "Foo"),
            new Condition(8, "Inf"),
            new Condition(7, "Qix"),
        ];

        $application = new Application($input, ";", $conditionsForMultiples);

        $application->verificationForMultiple();
        $application->verificationForContains($conditionsForContains);

        $this->assertEquals('Foo; Foo; Inf', $application->getResult());
    }


    public function testReturnedValueIsString() {
        $input = new Input(13);
        $conditions = [
            new Condition(3, "Foo"),
            new Condition(5, "Bar"),
            new Condition(7, "Qix")
        ];

        $application = new Application($input, ",", $conditions);

        $application->verificationForMultiple();

        $this->assertIsString($application->getResult());
        $this->assertEquals('13', $application->getResult());
    }

}