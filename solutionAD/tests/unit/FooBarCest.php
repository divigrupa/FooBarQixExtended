<?php
include dirname(__DIR__, 2) . '/App/App.php';

class FooBarCest
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

    public function givenNumberMustBePositive(UnitTester $I)
    {
        $app = new App(3);
        try {
            $result = $app->number;
            $I->assertGreaterThan(0, $result, 'Fail:Enter positive number');
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }

    public function givenNumberMustBeInteger(UnitTester $I)
    {
        $app = new App(7);
        try {
            $result = $app->number;
            $I->assertInternalType('int', $result, 'Fail:Enter integer Number');
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }

    public function returnTheGivenNumberAsAStringIfThereIsNoTransformationToDo(UnitTester $I)
    {
        $app = new App(7);
        try {
            $result = $app->getResult();
            $given = $app->number;
            $I->assertNotEquals($given, $result, $result . ' There Is No Transformation To Do ');
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }

}
?>

