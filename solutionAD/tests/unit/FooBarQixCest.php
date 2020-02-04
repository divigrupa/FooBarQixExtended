<?php
include dirname(__DIR__, 2) . '/App/App.php';

class FooBarQixCest
{
    /**
     * @example [3]
     * @example [6]
     * @example [19564434]
     */
    public function givenNumberDividesWith3ReturnFoo(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App(3);
        $result = $app->getResult();
        $I->assertEquals('Foo', $result);
    }


    /**
     * @example [5]
     * @example [10]
     * @example [5555555555]
     */
    public function givenNumberDividesWith5ReturnBar(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App($example[0]);
        $result = $app->getResult();
        $I->assertEquals('Bar', $result);
    }


    /**
     * @example [7]
     * @example [14]
     * @example [41274247]
     */
    public function givenNumberDividesWith7ReturnQix(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App($example[0]);
        $result = $app->getResult();
        $I->assertEquals('Qix', $result);
    }


    /**
     * @example [15]
     * @example [30]
     * @example [84482205]
     */
    public function givenNumberDividesWith5And3ReturnFooBar(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App($example[0]);
        $result = $app->getResult();
        $I->assertEquals('Foo, Bar', $result);
    }


    /**
     * @example [21]
     * @example [42]
     * @example [40456836]
     */
    public function givenNumberDividesWith3And7ReturnFooBar(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App($example[0]);
        $result = $app->getResult();
        $I->assertEquals('Foo, Qix', $result);
    }


    /**
     * @example [35]
     * @example [70]
     * @example [342493760]
     */
    public function givenNumberDividesWith5And7ReturnFooBar(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App($example[0]);
        $result = $app->getResult();
        $I->assertEquals('Bar, Qix', $result);
    }


    /**
     * @example [0]
     * @example [105]
     * @example [210]
     * @example [53438490]
     */
    public function givenNumberDividesWith5And3And7ReturnFooBarQix(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App($example[0]);
        $result = $app->getResult();
        $I->assertEquals('Foo, Bar, Qix', $result);
    }


    /**
     * @example [-105]
     * @example [-4]
     * @example [-123456789]
     */
    public function givenNegativeNumberThrowException(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App($example[0]);
        $I->expectThrowable(Exception::class, function () use ($app) {
            $app->getResult();
        });
    }

    /**
     * @example [true]
     * @example ["7"]
     * @example [5.5]
     * @example [null]
     */
    public function givenNumberIsNotIntegerThrowException(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App($example[0]);
        $I->expectThrowable(Exception::class, function () use ($app) {
            $app->getResult();
        });
    }


    /**
     * @example [1]
     * @example [2]
     * @example [4444444444]
     */
    public function returnTheGivenNumberAsAStringIfThereIsNoTransformationToDo(UnitTester $I, \Codeception\Example $example)
    {
        $app = new App($example[0]);
        $result = $app->getResult();
        $given = $app->number;
        $I->assertEquals($given, $result);
    }
}
?>