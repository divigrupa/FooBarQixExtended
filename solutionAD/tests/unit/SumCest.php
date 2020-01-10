<?php
include dirname(__DIR__, 2) . '/App/App.php';

class sumCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }


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

    public function givenNumberDividesWith5And3ReturnFooBar(UnitTester $I)
    {
        $app = new App(15);
        $result = $app->getResult();
        $I->assertEquals('Foo, Bar', $result);
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
        $app = new App(5);
        try {

            $result = $app->getResult();
            $dots = $app->number;
            $I->assertNotEquals($dots,$result,$result.' There Is No Transformation To Do ');

        } catch (Throwable $e) {
            echo $e->getMessage();

        }
    }

}
?>

