<?php
namespace Tests;

use App\Service;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    /**
     * STEP 1: CHECKING MULTIPLES OF 3 (FOO) AND 5 (BAR)
    */
    public function testMultipleOfThreeShouldReturnFoo()
    {
        $stepOne = new Service();
        $this->assertSame('Foo', $stepOne->checkIfMultiple(3));
        $this->assertSame('Foo', $stepOne->checkIfMultiple(6));
        $this->assertSame('Foo', $stepOne->checkIfMultiple(99));
        $this->assertSame('Foo', $stepOne->checkIfMultiple(117));
    }

    public function testMultipleOfFiveShouldReturnBar()
    {
        $stepOne = new Service();
        $this->assertSame('Bar', $stepOne->checkIfMultiple(5));
        $this->assertSame('Bar', $stepOne->checkIfMultiple(10));
        $this->assertSame('Bar', $stepOne->checkIfMultiple(20));
        $this->assertSame('Bar', $stepOne->checkIfMultiple(185));
    }

    public function testMultipleOfThreeAndFiveShouldReturnFooBar()
    {
        $stepOne = new Service();
        $this->assertSame('FooBar', $stepOne->checkIfMultiple(15));
        $this->assertSame('FooBar', $stepOne->checkIfMultiple(90));
        $this->assertSame('FooBar', $stepOne->checkIfMultiple(285));
        $this->assertSame('FooBar', $stepOne->checkIfMultiple(2565));
    }

    public function testMultipleShouldReturnNumber()
    {
        $stepOne = new Service();
        $this->assertSame('4', $stepOne->checkIfMultiple(4));
        $this->assertSame('8', $stepOne->checkIfMultiple(8));
        $this->assertSame('22', $stepOne->checkIfMultiple(22));
    }

    /**
     * STEP 2: CHECKING MULTIPLES OF ADDITIONAL 7 (QIX)
     */
    public function testMultipleOfSevenShouldReturnQix()
    {
        $stepTwo = new Service();
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(7));
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(14));
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(77));
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(539));
    }

    public function testMultipleOfThreeAndSevenShouldReturnFooQix()
    {
        $stepTwo = new Service();
        $this->assertSame('FooQix', $stepTwo->checkIfMultiple(21));
        $this->assertSame('FooQix', $stepTwo->checkIfMultiple(147));
        $this->assertSame('FooQix', $stepTwo->checkIfMultiple(441));
        $this->assertSame('FooQix', $stepTwo->checkIfMultiple(21609));
    }

    public function testMultipleOfFiveAndSevenShouldReturnBarQix()
    {
        $stepTwo = new Service();
        $this->assertSame('BarQix', $stepTwo->checkIfMultiple(35));
        $this->assertSame('BarQix', $stepTwo->checkIfMultiple(245));
        $this->assertSame('BarQix', $stepTwo->checkIfMultiple(1225));
        $this->assertSame('BarQix', $stepTwo->checkIfMultiple(60025));
    }

    public function testMultipleOfThreeFiveAndSevenShouldReturnFooBarQix()
    {
        $stepTwo = new Service();
        $this->assertSame('FooBarQix', $stepTwo->checkIfMultiple(105));
        $this->assertSame('FooBarQix', $stepTwo->checkIfMultiple(525));
        $this->assertSame('FooBarQix', $stepTwo->checkIfMultiple(1575));
        $this->assertSame('FooBarQix', $stepTwo->checkIfMultiple(11025));
    }

    /**
     * STEP 3: APPENDING FOO, BAR OR QIX TO NUMBERS CONTAINING 3, 5 AND 7 RESPECTIVELY
    */
    /**
     * A: NUMBERS CONTAINING 3, 5, AND/OR 7
    */
    public function testNumberWithThreeShouldReturnFoo()
    {
        $stepThreeA = new Service();
        $this->assertSame('Foo', $stepThreeA->checkIfContainsMultiple(13));
        $this->assertSame('FooFoo', $stepThreeA->checkIfContainsMultiple(33));
        $this->assertSame('FooFooFoo', $stepThreeA->checkIfContainsMultiple(343883));
    }
    public function testNumberWithFiveShouldReturnBar()
    {
        $stepThreeA = new Service();
        $this->assertSame('Bar', $stepThreeA->checkIfContainsMultiple(15));
        $this->assertSame('BarBar', $stepThreeA->checkIfContainsMultiple(55));
        $this->assertSame('BarBarBar', $stepThreeA->checkIfContainsMultiple(51565));
    }
    public function testNumberWithSevenShouldReturnQix()
    {
        $stepThreeA = new Service();
        $this->assertSame('Qix', $stepThreeA->checkIfContainsMultiple(17));
        $this->assertSame('QixQix', $stepThreeA->checkIfContainsMultiple(77));
        $this->assertSame('QixQixQix', $stepThreeA->checkIfContainsMultiple(7877));
    }
    public function testNumberWithThreeAndFiveShouldReturnFooBar()
    {
        $stepThreeA = new Service();
        $this->assertSame('FooBar', $stepThreeA->checkIfContainsMultiple(35));
        $this->assertSame('BarFoo', $stepThreeA->checkIfContainsMultiple(5036));
        $this->assertSame('BarFooBar', $stepThreeA->checkIfContainsMultiple(583445));
        $this->assertSame('BarFooFoo', $stepThreeA->checkIfContainsMultiple(522303));
    }
    public function testNumberWithThreeAndSevenShouldReturnFooQix()
    {
        $stepThreeA = new Service();
        $this->assertSame('FooQix', $stepThreeA->checkIfContainsMultiple(37));
        $this->assertSame('QixFoo', $stepThreeA->checkIfContainsMultiple(7003));
        $this->assertSame('QixFooQix', $stepThreeA->checkIfContainsMultiple(703007));
        $this->assertSame('QixFooFoo', $stepThreeA->checkIfContainsMultiple(713366));
    }
    public function testNumberWithFiveAndSevenShouldReturnBarQix()
    {
        $stepThreeA = new Service();
        $this->assertSame('BarQix', $stepThreeA->checkIfContainsMultiple(57));
        $this->assertSame('QixBar', $stepThreeA->checkIfContainsMultiple(7005));
        $this->assertSame('QixBarQix', $stepThreeA->checkIfContainsMultiple(705070));
        $this->assertSame('QixBarBar', $stepThreeA->checkIfContainsMultiple(705111115));
    }
    public function testNumberWithThreeFiveAndSevenShouldReturnFooBarQix()
    {
        $stepThreeA = new Service();
        $this->assertSame('FooBarQix', $stepThreeA->checkIfContainsMultiple(357));
        $this->assertSame('FooQixBar', $stepThreeA->checkIfContainsMultiple(37005));
        $this->assertSame('FooQixBarFooQix', $stepThreeA->checkIfContainsMultiple(370053117));
        $this->assertSame('BarFooQix', $stepThreeA->checkIfContainsMultiple(5311700));
        $this->assertSame('BarQixFoo', $stepThreeA->checkIfContainsMultiple(5117003));
        $this->assertSame('BarQixFooFooQix', $stepThreeA->checkIfContainsMultiple(5111703307));
        $this->assertSame('QixFooBar', $stepThreeA->checkIfContainsMultiple(7035));
        $this->assertSame('QixBarFoo', $stepThreeA->checkIfContainsMultiple(70511113));
        $this->assertSame('QixBarFooFooQixBar', $stepThreeA->checkIfContainsMultiple(705311131715));
    }

    /**
     * B: MULTIPLES CONTAINING 3, 5, AND/OR 7
     */
    /* multiple 3 contains 3 */
    public function testMultipleOfThreeWithTreeShouldReturnFooAppendFoo()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooFoo', $stepThreeB->verifyNumber(3));
        $this->assertSame('FooFoo', $stepThreeB->verifyNumber(243));
    }
    /* multiple 3 contains 5 */
    public function testMultipleOfThreeWithFiveShouldReturnFooAppendBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBar', $stepThreeB->verifyNumber(6561));
        $this->assertSame('FooBar', $stepThreeB->verifyNumber(59049));
    }
    /* multiple 3 contains 7 */
    public function testMultipleOfThreeWithSevenShouldReturnFooAppendQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooQix', $stepThreeB->verifyNumber(27));
        $this->assertSame('FooQix', $stepThreeB->verifyNumber(729));
    }
    /* multiple 3 contains 3-5 */
    public function testMultipleOfThreeWithTreeAndFiveShouldReturnFooAppendFooBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooFooBar', $stepThreeB->verifyNumber(351));
        $this->assertSame('FooBarFoo', $stepThreeB->verifyNumber(153));

    }
    /* multiple 3 contains 3-7 */
    public function testMultipleOfThreeWithThreeAndSevenShouldReturnFooAppendFooQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooFooQix', $stepThreeB->verifyNumber(3117));
        $this->assertSame('FooQixFoo', $stepThreeB->verifyNumber(7113));
    }
    /* multiple 3 contains 5-7 */
    public function testMultipleOfThreeWithFiveAndSevenShouldReturnFooAppendBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarQix', $stepThreeB->verifyNumber(57));
        $this->assertSame('FooQixBar', $stepThreeB->verifyNumber(7521));
    }
    /* multiple 3 contains 3-5-7 */
    public function testMultipleOfThreeWithSevenShouldReturnFooAppendFooBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooFooBarQix', $stepThreeB->verifyNumber(3215721));
        $this->assertSame('FooFooQixBar', $stepThreeB->verifyNumber(3217521));
        $this->assertSame('FooBarFooQix', $stepThreeB->verifyNumber(5213721));
        $this->assertSame('FooBarQixFoo', $stepThreeB->verifyNumber(5217321));
        $this->assertSame('FooQixFooBar', $stepThreeB->verifyNumber(7321521));
        $this->assertSame('FooQixBarFoo', $stepThreeB->verifyNumber(7521321));
    }

    #############################################################################################
    /* multiple 5 contains 3 */
    public function testMultipleOfFiveWithThreeShouldReturnBarAppendFoo()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarFoo', $stepThreeB->verifyNumber(130));
        $this->assertSame('BarFoo', $stepThreeB->verifyNumber(310));
    }
    /* multiple 5 contains 5 */
    public function testMultipleOfFiveWithFiveShouldReturnBarAppendBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarBar', $stepThreeB->verifyNumber(25));
        $this->assertSame('BarBar', $stepThreeB->verifyNumber(125));
    }
    /* multiple 5 contains 7 */
    public function testMultipleOfFiveWithSevenShouldReturnBarAppendQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarQix', $stepThreeB->verifyNumber(170));
        $this->assertSame('BarQix', $stepThreeB->verifyNumber(710));
    }
    /* multiple 5 contains 3-5 */
    public function testMultipleOfFiveWithThreeAndFiveShouldReturnBarAppendFooBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarFooBar', $stepThreeB->verifyNumber(325));
        $this->assertSame('BarBarFoo', $stepThreeB->verifyNumber(5230));
    }
    /* multiple 5 contains 3-7 */
    public function testMultipleOfFiveWithThreeAndSevenShouldReturnBarAppendFooQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarFooQix', $stepThreeB->verifyNumber(370));
        $this->assertSame('BarQixFoo', $stepThreeB->verifyNumber(730));
    }
    /* multiple 5 contains 5-7 */
    public function testMultipleOfFiveWithFiveAndSevenShouldReturnBarAppendBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarBarQix', $stepThreeB->verifyNumber(2570));
        $this->assertSame('BarQixBar', $stepThreeB->verifyNumber(275));
    }
    /* multiple 5 contains 3-5-7 */
    public function testMultipleOfFiveWithThreeFiveAndSevenShouldReturnBarAppendFooBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarFooBarQix', $stepThreeB->verifyNumber(35710));
        $this->assertSame('BarFooQixBar', $stepThreeB->verifyNumber(37150));
        $this->assertSame('BarBarFooQix', $stepThreeB->verifyNumber(53710));
        $this->assertSame('BarBarQixFoo', $stepThreeB->verifyNumber(57310));
        $this->assertSame('BarQixFooBar', $stepThreeB->verifyNumber(73510));
        $this->assertSame('BarQixBarFoo', $stepThreeB->verifyNumber(75310));
    }

    #################################################################################################
    /* multiple 7 contains 3 */
    public function testMultipleOfSevenWithThreeShouldReturnQixAppendFoo()
    {
        $stepThreeB = new Service();
        $this->assertSame('QixFoo', $stepThreeB->verifyNumber(238));
        $this->assertSame('QixFoo', $stepThreeB->verifyNumber(301));
    }
    /* multiple 7 contains 5 */
    public function testMultipleOfSevenWithFiveShouldReturnQixAppendBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('QixBar', $stepThreeB->verifyNumber(56));
        $this->assertSame('QixBar', $stepThreeB->verifyNumber(5488));
    }
    /* multiple 7 contains 7 */
    public function testMultipleOfSevenWithSevenShouldReturnQixAppendQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('QixQix', $stepThreeB->verifyNumber(7));
        $this->assertSame('QixQix', $stepThreeB->verifyNumber(2744));
    }
    /* multiple 7 contains 3-5 */
    public function testMultipleOfSevenWithThreeAndFiveShouldReturnQixAppendFooBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('QixFooBar', $stepThreeB->verifyNumber(3052));
        $this->assertSame('QixBarFoo', $stepThreeB->verifyNumber(532));
    }
    /* multiple 7 contains 3-7 */
    public function testMultipleOfSevenWithThreeAndSevenShouldReturnQixAppendFooQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('QixFooQix', $stepThreeB->verifyNumber(637));
        $this->assertSame('QixQixFoo', $stepThreeB->verifyNumber(763));
    }
    /* multiple 7 contains 5-7 */
    public function testMultipleOfSevenWithFiveAndSevenShouldReturnQixAppendBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('QixBarQix', $stepThreeB->verifyNumber(1057));
        $this->assertSame('QixQixBar', $stepThreeB->verifyNumber(2758));
    }
    /* multiple 7 contains 3-5-7 */
    public function testMultipleOfSevenWithThreeFiveAndSevenShouldReturnQixAppendFooBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('QixFooBarQix', $stepThreeB->verifyNumber(35287));
        $this->assertSame('QixFooQixBar', $stepThreeB->verifyNumber(3752));
        $this->assertSame('QixBarFooQix', $stepThreeB->verifyNumber(5327));
        $this->assertSame('QixBarQixFoo', $stepThreeB->verifyNumber(5873));
        $this->assertSame('QixQixFooBar', $stepThreeB->verifyNumber(73052));
        $this->assertSame('QixQixBarFoo', $stepThreeB->verifyNumber(7532));
    }

    #################################################################################################
    /* multiple 3-5 contains 3 */
    public function testMultipleOfThreeAndFiveWithThreeShouldReturnFooBarAppendFoo()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarFoo', $stepThreeB->verifyNumber(30));
    }
    /* multiple 3-7 contains 3 */
    public function testMultipleOfThreeAndSevenWithThreeShouldReturnFooQixAppendFoo()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooQixFoo', $stepThreeB->verifyNumber(231));
    }
    /* multiple 5-7 contains 3 */
    public function testMultipleOfFiveAndSevenWithThreeShouldReturnBarQixAppendFoo()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarQixFoo', $stepThreeB->verifyNumber(3010));
    }
    /* multiple 3-5-7 contains 3 */
    public function testMultipleOfThreeFiveAndSevenWithThreeShouldReturnFooBarQixAppendFoo()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarQixFoo', $stepThreeB->verifyNumber(630));
    }

    #############################################################################################
    /* multiple 3-5 contains 5 */
    public function testMultipleOfThreeAndFiveWithFiveShouldReturnFooBarAppendBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarBar', $stepThreeB->verifyNumber(15));
    }
    /* multiple 3-7 contains 5 */
    public function testMultipleOfThreeAndSevenWithFiveShouldReturnFooQixAppendBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooQixBar', $stepThreeB->verifyNumber(504));
    }
    /* multiple 5-7 contains 5 */
    public function testMultipleOfFiveAndSevenWithFiveShouldReturnBarQixAppendBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarQixBar', $stepThreeB->verifyNumber(245));
    }
    /* multiple 3-5-7 contains 5 */
    public function testMultipleOfThreeFiveAndSevenWithFiveShouldReturnFooBarQixAppendBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarQixBar', $stepThreeB->verifyNumber(945));
    }

    ##########################################################################################
    /* multiple 3-5 contains 7 */ ######
    public function testMultipleOfThreeAndFiveWithSevenShouldReturnFooBarAppendQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarQix', $stepThreeB->verifyNumber(870));
    }
    /* multiple 3-7 contains 7 */
    public function testMultipleOfThreeAndSevenWithSevenShouldReturnFooQixAppendQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooQixQix', $stepThreeB->verifyNumber(714));
    }
    /* multiple 5-7 contains 7 */
    public function testMultipleOfFiveAndSevenWithSevenShouldReturnBarQixAppendQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarQixQix', $stepThreeB->verifyNumber(7210));
    }
    /* multiple 3-5-7 contains 7 */
    public function testMultipleOfThreeFiveAndSevenWithSevenShouldReturnFooBarQixAppendQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarQixQix', $stepThreeB->verifyNumber(70140));
    }

    ############################################################################################
    /* multiple 3-5 contains 3-5 */
    public function testMultipleOfThreeAndFiveWithTreeAndFiveShouldReturnFooBarAppendFooBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarFooBar', $stepThreeB->verifyNumber(345));
        $this->assertSame('FooBarBarFooBar', $stepThreeB->verifyNumber(15135));
    }
    /* multiple 3-5 contains 3-7 */
    public function testMultipleOfThreeAndFiveWithThreeAndSevenShouldReturnFooBarAppendFooQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarFooQix', $stepThreeB->verifyNumber(13710));
        $this->assertSame('FooBarQixFoo', $stepThreeB->verifyNumber(17310));
    }
    /* multiple 3-5 contains 5-7 */
    public function testMultipleOfThreeAndFiveWithFiveAndSevenShouldReturnFooBarAppendBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarBarQix', $stepThreeB->verifyNumber(570));
        $this->assertSame('FooBarQixBar', $stepThreeB->verifyNumber(765));
    }
    /* multiple 3-5 contains 3-5-7 */
    public function testMultipleOfThreeAndFiveWithTreeFiveAndSevenShouldReturnFooBarAppendFooBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarFooBarQixBar', $stepThreeB->verifyNumber(13575));
        $this->assertSame('FooBarFooQixBar', $stepThreeB->verifyNumber(375));

    }

    ###############################################################################################
    /* multiple 3-7 contains 3-5 */
    public function testMultipleOfThreeAndSevenWithThreeAndFiveShouldReturnFooQixAppendFooBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooQixFooBar', $stepThreeB->verifyNumber(13524));
        $this->assertSame('FooQixBarFooFoo', $stepThreeB->verifyNumber(1533));
        $this->assertSame('FooQixBarFoo', $stepThreeB->verifyNumber(1953));
    }
    /* multiple 3-7 contains 3-7 */
    public function testMultipleOfThreeAndSevenWithThreeAndSevenShouldReturnFooQixAppendFooQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooQixFooQix', $stepThreeB->verifyNumber(378));
        $this->assertSame('FooQixQixFoo', $stepThreeB->verifyNumber(273));
    }
    /* multiple 3-7 contains 5-7 */
    public function testMultipleOfThreeAndSevenWithFiveAndSevenShouldReturnFooQixAppendBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooQixBarQix', $stepThreeB->verifyNumber(567));
        $this->assertSame('FooQixQixBar', $stepThreeB->verifyNumber(756));
    }
    /* multiple 3-7 contains 3-5-7 */
    public function testMultipleOfThreeAndSevenWithThreeFiveAndSevenShouldReturnFooQixAppendFooBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooQixFooBarQix', $stepThreeB->verifyNumber(357));
        $this->assertSame('FooQixQixBarFoo', $stepThreeB->verifyNumber(7539));
    }

    ###############################################################################################
    /* multiple 5-7 contains 3-5 */
    public function testMultipleOfFiveAndSevenWithThreeAndFiveShouldReturnBarQixAppendFooBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarQixFooBar', $stepThreeB->verifyNumber(35));
        $this->assertSame('BarQixBarFoo', $stepThreeB->verifyNumber(5320));
    }
    /* multiple 5-7 contains 3-7 */
    public function testMultipleOfFiveAndSevenWithThreeAndSevenShouldReturnBarQixAppendFooQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarQixFooQix', $stepThreeB->verifyNumber(13720));
        $this->assertSame('BarQixQixFoo', $stepThreeB->verifyNumber(17360));
    }
    /* multiple 5-7 contains 5-7 */
    public function testMultipleOfFiveAndSevenWithFiveAndSevenShouldReturnBarQixAppendBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarQixBarQixBar', $stepThreeB->verifyNumber(5705));
        $this->assertSame('BarQixQixBar', $stepThreeB->verifyNumber(175));
    }
    /* multiple 5-7 contains 3-5-7 */
    public function testMultipleOfFiveAndSevenWithThreeFiveAndSevenShouldReturnBarQixAppendFooBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('BarQixFooBarQixQix', $stepThreeB->verifyNumber(35770));
        $this->assertSame('BarQixQixFooBarQix', $stepThreeB->verifyNumber(73570));
    }

    ###############################################################################################
    /* multiple 3-5-7 contains 3-5 */
    public function testMultipleOfThreeFiveAndSevenWithThreeAndFiveShouldReturnFooBarQixAppendFooBar()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarQixFooBar', $stepThreeB->verifyNumber(315));
        $this->assertSame('FooBarQixBarFooFoo', $stepThreeB->verifyNumber(15330));
    }
    /* multiple 3-5-7 contains 3-7 */
    public function testMultipleOfThreeFiveAndSevenWithThreeAndSevenShouldReturnFooBarQixAppendFooQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarQixFooQix', $stepThreeB->verifyNumber(20370));
        $this->assertSame('FooBarQixFooQixFoo', $stepThreeB->verifyNumber(37380));
    }
    /* multiple 3-5-7 contains 5-7 */
    public function testMultipleOfThreeFiveAndSevenWithFiveAndSevenShouldReturnFooBarQixAppendBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarQixBarQixBar', $stepThreeB->verifyNumber(1575));
        $this->assertSame('FooBarQixQixBar', $stepThreeB->verifyNumber(1785));
    }
    /* multiple 3-5-7 contains 3-5-7 */
    public function testMultipleOfThreeFiveAndSevenWithThreeFiveAndSevenShouldReturnFooBarQixAppendFooBarQix()
    {
        $stepThreeB = new Service();
        $this->assertSame('FooBarQixFooBarQix', $stepThreeB->verifyNumber(3570));
        $this->assertSame('FooBarQixQixFooBar', $stepThreeB->verifyNumber(735));
        $this->assertSame('FooBarQixFooQixBarBar', $stepThreeB->verifyNumber(13755));
    }

}
