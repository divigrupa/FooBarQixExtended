<?php
include dirname(__DIR__, 2) . '/App/App.php';

class FooBarQixCest
{
    public function givenNumberDividesWith3ReturnFoo(UnitTester $I)
    {
        $app = new App(3);
        $result = $app->getResult();
        $I->assertEquals('Foo', $result);
    }

    public function givenNumberDividesWith5ReturnBar(UnitTester $I)
    {
        $app = new App(5);
        $result = $app->getResult();
        $I->assertEquals('Bar', $result);
    }

    public function givenNumberDividesWith7ReturnQix(UnitTester $I)
    {
        $app = new App(7);
        $result = $app->getResult();
        $I->assertEquals('Qix', $result);
    }

    public function givenNumberDividesWith5And3ReturnFooBar(UnitTester $I)
    {
        $app = new App(15);
        $result = $app->getResult();
        $I->assertEquals('Foo, Bar', $result);
    }

    public function givenNumberDividesWith5And3And7ReturnFooBarQix(UnitTester $I)
    {
        $app = new App(105);
        $result = $app->getResult();
        $I->assertEquals('Foo, Bar, Qix', $result);
    }

    public function givenNumberDividesWith3And7ReturnFooBar(UnitTester $I)
    {
        $app = new App(21);
        $result = $app->getResult();
        $I->assertEquals('Foo, Qix', $result);
    }

    public function givenNumberDividesWith5And7ReturnFooBar(UnitTester $I)
    {
        $app = new App(35);
        $result = $app->getResult();
        $I->assertEquals('Bar, Qix', $result);
    }

    public function givenNegativeNumberThrowException(UnitTester $I)
    {
        $I->expectThrowable(Exception::class, function () {
            (new App(-35))->getResult();
        });
    }

    public function givenNumberIsNotIntegerThrowException(UnitTester $I)
    {
        $I->expectThrowable(Exception::class, function () {
            (new App('7'))->getResult();
        });
    }

    public function returnTheGivenNumberAsAStringIfThereIsNoTransformationToDo(UnitTester $I)
    {
        $app = new App(92);
        $result = $app->getResult();
        $given =$app->number;
        $I->assertIsString($result);
        $I->assertEquals($given, $result);
    }
}
?>