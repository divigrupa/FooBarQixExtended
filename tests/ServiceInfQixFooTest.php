<?php

namespace Tests;

use App\ServiceInfQixFoo;
use PHPUnit\Framework\TestCase;

class ServiceInfQixFooTest extends TestCase
{
    /**
     * STEP 4: CHECKING MULTIPLES OF 8 (INF), 7 (QIX) AND 3 (FOO)
     */
    /* multiple 8 */
    public function testMultipleOfEightShouldReturnInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf', $stepFour->checkIfMultiple(8));
        $this->assertSame('Inf', $stepFour->checkIfMultiple(16));
        $this->assertSame('Inf', $stepFour->checkIfMultiple(88));
    }
    /* multiple 7 */
    public function testMultipleOfSevenShouldReturnQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix', $stepFour->checkIfMultiple(7));
        $this->assertSame('Qix', $stepFour->checkIfMultiple(77));
        $this->assertSame('Qix', $stepFour->checkIfMultiple(539));
    }
    /* multiple 3 */
    public function testMultipleOfThreeShouldReturnFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo', $stepFour->checkIfMultiple(3));
        $this->assertSame('Foo', $stepFour->checkIfMultiple(99));
        $this->assertSame('Foo', $stepFour->checkIfMultiple(117));
    }
    /* multiple 8-7 */
    public function testMultipleOfEightAndSevenShouldReturnInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix', $stepFour->checkIfMultiple(56));
        $this->assertSame('Inf; Qix', $stepFour->checkIfMultiple(448));
        $this->assertSame('Inf; Qix', $stepFour->checkIfMultiple(1568));
    }
    /* multiple 8-3 */
    public function testMultipleOfEightAndThreeShouldReturnInfFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo', $stepFour->checkIfMultiple(24));
        $this->assertSame('Inf; Foo', $stepFour->checkIfMultiple(192));
        $this->assertSame('Inf; Foo', $stepFour->checkIfMultiple(576));
    }
    /* multiple 7-3 */
    public function testMultipleOfSevenAndThreeShouldReturnQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo', $stepFour->checkIfMultiple(21));
        $this->assertSame('Qix; Foo', $stepFour->checkIfMultiple(147));
        $this->assertSame('Qix; Foo', $stepFour->checkIfMultiple(441));
    }
    /* multiple 8-7-3 */
    public function testMultipleOfEightSevenAndThreeShouldReturnInfQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo', $stepFour->checkIfMultiple(168));
        $this->assertSame('Inf; Qix; Foo', $stepFour->checkIfMultiple(1512));
        $this->assertSame('Inf; Qix; Foo', $stepFour->checkIfMultiple(4536));
    }
    /* number */
    public function testMultipleShouldReturnNumber()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('4', $stepFour->checkIfMultiple(4));
        $this->assertSame('11', $stepFour->checkIfMultiple(11));
        $this->assertSame('127', $stepFour->checkIfMultiple(127));
    }



    /**
     * NUMBERS CONTAINING 8, 7, AND/OR 3
     */
    /* contains 8 */
    public function testNumberContainsEightShouldReturnInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf', $stepFour->checkIfContainsMultiple(18));
        $this->assertSame('Inf; Inf', $stepFour->checkIfContainsMultiple(88));
        $this->assertSame('Inf; Inf; Inf', $stepFour->checkIfContainsMultiple(81868));
    }
    /* contains 7 */
    public function testNumberContainsSevenShouldReturnQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix', $stepFour->checkIfContainsMultiple(17));
        $this->assertSame('Qix; Qix', $stepFour->checkIfContainsMultiple(77));
        $this->assertSame('Qix; Qix; Qix', $stepFour->checkIfContainsMultiple(7677));
    }
    /* contains 3 */
    public function testNumberContainsThreeShouldReturnFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo', $stepFour->checkIfContainsMultiple(13));
        $this->assertSame('Foo; Foo', $stepFour->checkIfContainsMultiple(33));
        $this->assertSame('Foo; Foo; Foo', $stepFour->checkIfContainsMultiple(343663));
    }
    /* contains 8-7 */
    public function testNumberContainsEightAndSevenShouldReturnInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix', $stepFour->checkIfContainsMultiple(87));
        $this->assertSame('Qix; Inf', $stepFour->checkIfContainsMultiple(7008));
        $this->assertSame('Qix; Inf; Qix', $stepFour->checkIfContainsMultiple(708070));
        $this->assertSame('Qix; Inf; Inf', $stepFour->checkIfContainsMultiple(708111118));
    }
    /* contains 8-3 */
    public function testNumberContainsEightAndThreeShouldReturnInfFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Inf', $stepFour->checkIfContainsMultiple(38));
        $this->assertSame('Inf; Foo', $stepFour->checkIfContainsMultiple(8036));
        $this->assertSame('Inf; Inf; Foo; Inf', $stepFour->checkIfContainsMultiple(883448));
        $this->assertSame('Inf; Foo; Foo', $stepFour->checkIfContainsMultiple(822303));
    }
    /* contains 7-3 */
    public function testNumberContainsSevenAndThreeShouldReturnQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Qix', $stepFour->checkIfContainsMultiple(37));
        $this->assertSame('Qix; Foo', $stepFour->checkIfContainsMultiple(7003));
        $this->assertSame('Qix; Foo; Qix', $stepFour->checkIfContainsMultiple(703007));
        $this->assertSame('Qix; Foo; Foo', $stepFour->checkIfContainsMultiple(713366));
    }

    /* contains 8-7-3 */
    public function testNumberContainsThreeEightAndSevenShouldReturnFooInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Inf; Qix', $stepFour->checkIfContainsMultiple(387));
        $this->assertSame('Foo; Qix; Inf', $stepFour->checkIfContainsMultiple(37008));
        $this->assertSame('Foo; Qix; Inf; Foo; Qix', $stepFour->checkIfContainsMultiple(370083117));
        $this->assertSame('Inf; Foo; Qix', $stepFour->checkIfContainsMultiple(8311700));
        $this->assertSame('Inf; Qix; Foo', $stepFour->checkIfContainsMultiple(8117003));
        $this->assertSame('Inf; Qix; Foo; Foo; Qix', $stepFour->checkIfContainsMultiple(8111703307));
        $this->assertSame('Qix; Foo; Inf', $stepFour->checkIfContainsMultiple(7038));
        $this->assertSame('Qix; Inf; Foo', $stepFour->checkIfContainsMultiple(70811113));
        $this->assertSame('Qix; Inf; Foo; Foo; Qix; Inf', $stepFour->checkIfContainsMultiple(708311131718));
    }

    /**
     * APPENDING INF, QIX OR FOO TO MULTIPLES CONTAINING 8, 7 and 3 RESPECTIVELY
     */
    /* multiple 8 contains 8 */
    public function testMultipleOfEightContainsThreeShouldReturnInfAppendFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Inf', $stepFour->verifyNumberIsInfQixFoo(184));
        $this->assertSame('Inf; Inf; Inf', $stepFour->verifyNumberIsInfQixFoo(88));
    }
    /* multiple 8 contains 7 */
    public function testMultipleOfEightContainsSevenShouldReturnInfAppendQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(704));
        $this->assertSame('Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(760));
    }
    /* multiple 8 contains 3 */
    public function testMultipleOfEightContainsEightShouldReturnInfAppendInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(136));
        $this->assertSame('Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(320));
    }
    /* multiple 8 contains 8-7 */
    public function testMultipleOfEightContainsEightAndSevenShouldReturnInfAppendInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(872));
        $this->assertSame('Inf; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(1768));
    }
    /* multiple 8 contains 8-3 */
    public function testMultipleOfEightContainsEightAndThreeShouldReturnInfAppendInfFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(1384));
        $this->assertSame('Inf; Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(832));
    }
    /* multiple 8 contains 7-3 */
    public function testMultipleOfEightContainsSevenAndThreeShouldReturnInfAppendQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(376));
        $this->assertSame('Inf; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(736));
    }
    /* multiple 8 contains 8-7-3 */
    public function testMultipleOfEightContainsEightSevenAndThreeShouldReturnInfAppendInfQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(3872));
        $this->assertSame('Inf; Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(13784));
        $this->assertSame('Inf; Inf; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(18376));
        $this->assertSame('Inf; Inf; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(18736));
        $this->assertSame('Inf; Qix; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(17368));
        $this->assertSame('Inf; Qix; Inf; Foo; Foo', $stepFour->verifyNumberIsInfQixFoo(178336));
    }

    #################################################################################################
    /* multiple 7 contains 8 */
    public function testMultipleOfSevenContainsEightShouldReturnQixAppendInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(1085));
        $this->assertSame('Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(1148));
    }
    /* multiple 7 contains 7 */
    public function testMultipleOfSevenContainsSevenShouldReturnQixAppendQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Qix', $stepFour->verifyNumberIsInfQixFoo(7));
        $this->assertSame('Qix; Qix', $stepFour->verifyNumberIsInfQixFoo(749));
    }
    /* multiple 7 contains 3 */
    public function testMultipleOfSevenContainsThreeShouldReturnQixAppendFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Foo', $stepFour->verifyNumberIsInfQixFoo(133));
        $this->assertSame('Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(301));
    }
    /* multiple 7 contains 8-7 */
    public function testMultipleOfSevenContainsEightAndSevenShouldReturnQixAppendInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(287));
        $this->assertSame('Qix; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(1078));
    }
    /* multiple 7 contains 8-3 */
    public function testMultipleOfSevenContainsEightAndThreeShouldReturnQixAppendFooInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(308));
        $this->assertSame('Qix; Inf; Foo; Foo', $stepFour->verifyNumberIsInfQixFoo(833));
    }
    /* multiple 7 contains 7-3 */
    public function testMultipleOfSevenContainsSevenAndThreeShouldReturnQixAppendQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(637));
        $this->assertSame('Qix; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(763));
    }
    /* multiple 7 contains 8-7-3 */
    public function testMultipleOfSevenContainsThreeEightAndSevenShouldReturnQixAppendInfQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(35287));
        $this->assertSame('Qix; Foo; Qix; Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(13783));
        $this->assertSame('Qix; Inf; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(8372));
        $this->assertSame('Qix; Inf; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(5873));
        $this->assertSame('Qix; Qix; Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(7378));
        $this->assertSame('Qix; Qix; Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(17843));
    }

    #################################################################################################
    /* multiple 3 contains 8 */
    public function testMultipleOfThreeContainsEightShouldReturnFooAppendInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(18));
        $this->assertSame('Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(81));
    }
    /* multiple 3 contains 7 */
    public function testMultipleOfThreeContainsSevenShouldReturnFooAppendQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(27));
        $this->assertSame('Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(729));
    }
    /* multiple 3 contains 3 */
    public function testMultipleOfThreeContainsTreeShouldReturnFooAppendFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Foo', $stepFour->verifyNumberIsInfQixFoo(3));
        $this->assertSame('Foo; Foo', $stepFour->verifyNumberIsInfQixFoo(243));
    }
    /* multiple 3 contains 8-7 */
    public function testMultipleOfThreeContainsEightAndSevenShouldReturnFooAppendInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(1287));
        $this->assertSame('Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(1278));
    }
    /* multiple 3 contains 8-3 */
    public function testMultipleOfThreeContainsEightAndTreeShouldReturnFooAppendInfFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(1038));
        $this->assertSame('Foo; Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(1083));
    }
    /* multiple 3 contains 7-3 */
    public function testMultipleOfThreeContainsSevenAndThreeShouldReturnFooAppendQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(3117));
        $this->assertSame('Foo; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(7113));
    }
    /* multiple 3 contains 8-7-3 */
    public function testMultipleOfThreeContainsEightSevenAndThreeShouldReturnFooAppendInfQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Foo; Foo; Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(13827));
        $this->assertSame('Foo; Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(3078));
        $this->assertSame('Foo; Inf; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(18327));
        $this->assertSame('Foo; Inf; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(18723));
        $this->assertSame('Foo; Qix; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(17358));
        $this->assertSame('Foo; Qix; Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(17835));
    }

    #############################################################################################
    /* multiple 8-7 contains 8 */
    public function testMultipleOfEightAndSevenContainsEightShouldReturnInfQixAppendInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Inf; Inf', $stepFour->verifyNumberIsInfQixFoo(1288));
    }
    /* multiple 8-3 contains 8 */
    public function testMultipleOfEightAndThreeContainsEightShouldReturnInfFooAppendInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(1248));
    }
    /* multiple 7-3 contains 8 */
    public function testMultipleOfSevenAndThreeContainsEightShouldReturnQixFooAppendInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(1218));
    }
    /* multiple 8-7-3 contains 8 */
    public function testMultipleOfEightSevenAndThreeContainsEightShouldReturnInfQixFooAppendInf()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(1008));
    }

    #############################################################################################
    /* multiple 8-7 contains 7 */
    public function testMultipleOfEightAndSevenContainsSevenShouldReturnInfQixAppendQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Qix', $stepFour->verifyNumberIsInfQixFoo(2744));
    }
    /* multiple 8-3 contains 7 */
    public function testMultipleOfEightAndThreeContainsSevenShouldReturnInfFooAppendQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(7152));
    }
    /* multiple 7-3 contains 7 */
    public function testMultipleOfSevenAndThreeContainsSevenShouldReturnQixFooAppendQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(714));
    }
    /* multiple 8-7-3 contains 7 */
    public function testMultipleOfEightSevenAndThreeContainsSevenShouldReturnInfQixFooAppendQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(1176));
    }

    ##########################################################################################
    /* multiple 8-7 contains 3 */
    public function testMultipleOfEightAndSevenContainsThreeShouldReturnInfQixAppendFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Foo', $stepFour->verifyNumberIsInfQixFoo(3136));
    }
    /* multiple 8-3 contains 3 */
    public function testMultipleOfEightAndThreeContainsThreeShouldReturnInfFooAppendFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Foo', $stepFour->verifyNumberIsInfQixFoo(360));
    }
    /* multiple 7-3 contains 3 */
    public function testMultipleOfSevenAndThreeContainsThreeShouldReturnQixFooAppendFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Foo', $stepFour->verifyNumberIsInfQixFoo(231));
    }
    /* multiple 8-7-3 contains 3 */
    public function testMultipleOfEightSevenAndThreeContainsThreeShouldReturnInfQixFooAppendFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Foo', $stepFour->verifyNumberIsInfQixFoo(3024));
    }

    ###############################################################################################
    /* multiple 8-7 contains 8-7 */
    public function testMultipleOfEightAndSevenContainsEightAndSevenShouldReturnInfQixAppendInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(728));
        $this->assertSame('Inf; Qix; Inf; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(87248));
    }
    /* multiple 8-7 contains 8-3 */
    public function testMultipleOfEightAndSevenContainsEightAndThreeShouldReturnInfQixAppendInfFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Inf; Inf', $stepFour->verifyNumberIsInfQixFoo(38248));
        $this->assertSame('Inf; Qix; Inf; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(83048));
    }
    /* multiple 8-7 contains 7-3 */
    public function testMultipleOfEightAndSevenContainsSevenAndThreeShouldReturnInfQixAppendQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(229376));
        $this->assertSame('Inf; Qix; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(57344));
    }
    /* multiple 8-7 contains 8-7-3 */
    public function testMultipleOfEightAndSevenContainsEightSevenAndThreeShouldReturnInfQixAppendInfQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Inf; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(87304));
        $this->assertSame('Inf; Qix; Qix; Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(178136));
    }

    ############################################################################################
    /* multiple 8-3 contains 8-7 */
    public function testMultipleOfEightAndThreeContainsEightAndSevenShouldReturnInfFooAppendInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(8712));
        $this->assertSame('Inf; Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(768));
    }
    /* multiple 8-3 contains 8-3 */
    public function testMultipleOfEightAndThreeContainsEightAndThreeShouldReturnInfFooAppendInfFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(13824));
        $this->assertSame('Inf; Foo; Inf; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(8328));
    }
    /* multiple 8-3 contains 7-3 */
    public function testMultipleOfEightAndThreeContainsSevenAndThreeShouldReturnInfFooAppendQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(3720));
        $this->assertSame('Inf; Foo; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(7320));
    }
    /* multiple 8-3 contains 8-7-3 */
    public function testMultipleOfEightAndThreeContainsEightSevenAndTreeShouldReturnInfFooAppendInfQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Foo; Qix; Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(17832));
        $this->assertSame('Inf; Foo; Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(3768));

    }

    ###############################################################################################
    /* multiple 7-3 contains 8-7 */
    public function testMultipleOfSevenAndThreeContainsEightAndSevenShouldReturnQixFooAppendInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Inf; Qix; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(8778));
        $this->assertSame('Qix; Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(798));
    }
    /* multiple 7-3 contains 8-3 */
    public function testMultipleOfSevenAndThreeContainsEightAndThreeShouldReturnQixFooAppendInfFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(23814));
        $this->assertSame('Qix; Foo; Inf; Foo', $stepFour->verifyNumberIsInfQixFoo(8316));
    }
    /* multiple 7-3 contains 7-3 */
    public function testMultipleOfSevenAndThreeContainsSevenAndThreeShouldReturnQixFooAppendQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Foo; Qix; Qix', $stepFour->verifyNumberIsInfQixFoo(3717));
        $this->assertSame('Qix; Foo; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(273));
    }
    /* multiple 7-3 contains 8-7-3 */
    public function testMultipleOfSevenAndThreeContainsEightSevenAndThreeShouldReturnQixFooAppendInfQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Qix; Foo; Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(378));
        $this->assertSame('Qix; Foo; Qix; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(7308));
    }

    ###############################################################################################
    /* multiple 8-7-3 contains 8-7 */
    public function testMultipleOfEightSevenAndThreeContainsEightAndSevenShouldReturnInfQixFooAppendInfQix()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Inf; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(852768));
        $this->assertSame('Inf; Qix; Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(1741824));
    }
    /* multiple 8-7-3 contains 8-3 */
    public function testMultipleOfEightSevenAndThreeContainsEightAndThreeShouldReturnInfQixFooAppendInfFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Foo; Inf; Inf', $stepFour->verifyNumberIsInfQixFoo(36288));
        $this->assertSame('Inf; Qix; Foo; Foo; Inf', $stepFour->verifyNumberIsInfQixFoo(399168));
    }
    /* multiple 8-7-3 contains 7-3 */
    public function testMultipleOfEightSevenAndThreeContainsSevenAndThreeShouldReturnInfQixFooAppendQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Foo; Qix', $stepFour->verifyNumberIsInfQixFoo(5376));
        $this->assertSame('Inf; Qix; Foo; Qix; Foo', $stepFour->verifyNumberIsInfQixFoo(7392));
    }
    /* multiple 8-7-3 contains 8-7-3 */
    public function testMultipleOfEightSevenAndThreeContainsEightSevenAndThreeShouldReturnInfQixFooAppendInfQixFoo()
    {
        $stepFour = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Foo; Qix; Inf', $stepFour->verifyNumberIsInfQixFoo(37968));
        $this->assertSame('Inf; Qix; Foo; Foo; Inf; Qix', $stepFour->verifyNumberIsInfQixFoo(38472));
    }

    /**
     * STEP 5: CHECK IF SUM OF ALL DIGITS IS MULTIPLE OF 8 (INF)
    */
    public function testSumOfAllDigitsIsMultipleOfEight()
    {
        $stepFive = new ServiceInfQixFoo();
        $this->assertSame('Inf; Qix; Foo; Foo; Inf; QixInf', $stepFive->sumOfAllDigits(38472));
        $this->assertSame('Inf; Qix; Foo; Foo; Qix', $stepFive->sumOfAllDigits(5376));
        $this->assertSame('Inf; InfInf', $stepFive->sumOfAllDigits(8));
        $this->assertSame('38471', $stepFive->sumOfAllDigits(38471));
    }

}
