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

//    public function sumTest(UnitTester $I)
//    {
//    }

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

    public function givenNegativeNumberReturnException(UnitTester $I)
    {
        $app = new App(7);
        try {
            $result = $app->skaitlis;
            // $I->assert;

            $I->assertGreaterThan(0, $result, 'Fail');
            //$I->fail('Fail');
        } catch (Throwable $e) {
           echo $e->getMessage();
        }
    }

    public function givenNonIntegerReturnException(UnitTester $I)
    {
        $app = new App(7);
        try {

            $result = $app->skaitlis;

            $I->assertInternalType('int', $result, 'Fail:NonInteger');

        } catch (Throwable $e) {
            echo $e->getMessage();

        }
    }
    public function returnTheGivenNumberAsAStringIfThereIsNoTransformationToDo(UnitTester $I)
    {
        $app = new App(15);
        try {

            $result = $app->getResult();
            $dots = $app->skaitlis;
            $I->assertNotEquals('',$result,$dots.'  There Is No Transformation To Do ');

        } catch (Throwable $e) {
            echo $e->getMessage();

        }
    }
}
?>

