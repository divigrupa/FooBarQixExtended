<?php
namespace Tests;

/** Following part until the Class and after the class, is implemented for the Code coverage report.
* For testing purposes, the code outside the Class should be commented out.
*/
require '../vendor/autoload.php';
require 'app/ServiceFooBarQix.php';

use App\ServiceFooBarQix;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\CodeCoverage\Filter;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Report\Html\Facade as HtmlReport;

$filter = new Filter;
$filter->includeFile('app/ServiceFooBarQix.php');
$coverage = new CodeCoverage(
    (new Selector)->forLineCoverage($filter),
    $filter
);

$coverage->start('ServiceFooBarQix');

class ServiceFooBarQixTest extends TestCase
{
    /**
     * STEP 1: CHECKING MULTIPLES OF 3 (FOO) AND 5 (BAR)
    */
    /* multiple 3 */
    public function testMultipleOfThreeShouldReturnFoo()
    {
        $stepOne = new ServiceFooBarQix();
        $this->assertSame('Foo', $stepOne->checkIfMultiple(3));
        $this->assertSame('Foo', $stepOne->checkIfMultiple(6));
        $this->assertSame('Foo', $stepOne->checkIfMultiple(99));
        $this->assertSame('Foo', $stepOne->checkIfMultiple(117));
    }
    /* multiple 5 */
    public function testMultipleOfFiveShouldReturnBar()
    {
        $stepOne = new ServiceFooBarQix();
        $this->assertSame('Bar', $stepOne->checkIfMultiple(5));
        $this->assertSame('Bar', $stepOne->checkIfMultiple(10));
        $this->assertSame('Bar', $stepOne->checkIfMultiple(20));
        $this->assertSame('Bar', $stepOne->checkIfMultiple(185));
    }
    /* multiple 3-5 */
    public function testMultipleOfThreeAndFiveShouldReturnFooBar()
    {
        $stepOne = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar', $stepOne->checkIfMultiple(15));
        $this->assertSame('Foo, Bar', $stepOne->checkIfMultiple(90));
        $this->assertSame('Foo, Bar', $stepOne->checkIfMultiple(285));
        $this->assertSame('Foo, Bar', $stepOne->checkIfMultiple(2565));
    }
    /* number */
    public function testMultipleShouldReturnNumber()
    {
        $stepOne = new ServiceFooBarQix();
        $this->assertSame('4', $stepOne->checkIfMultiple(4));
        $this->assertSame('8', $stepOne->checkIfMultiple(8));
        $this->assertSame('22', $stepOne->checkIfMultiple(22));
    }

    /**
     * STEP 2: CHECKING MULTIPLES OF ADDITIONAL 7 (QIX)
     */
    /* multiple 7 */
    public function testMultipleOfSevenShouldReturnQix()
    {
        $stepTwo = new ServiceFooBarQix();
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(7));
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(14));
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(77));
        $this->assertSame('Qix', $stepTwo->checkIfMultiple(539));
    }
    /* multiple 3-7 */
    public function testMultipleOfThreeAndSevenShouldReturnFooQix()
    {
        $stepTwo = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix', $stepTwo->checkIfMultiple(21));
        $this->assertSame('Foo, Qix', $stepTwo->checkIfMultiple(147));
        $this->assertSame('Foo, Qix', $stepTwo->checkIfMultiple(441));
        $this->assertSame('Foo, Qix', $stepTwo->checkIfMultiple(21609));
    }
    /* multiple 5-7 */
    public function testMultipleOfFiveAndSevenShouldReturnBarQix()
    {
        $stepTwo = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix', $stepTwo->checkIfMultiple(35));
        $this->assertSame('Bar, Qix', $stepTwo->checkIfMultiple(245));
        $this->assertSame('Bar, Qix', $stepTwo->checkIfMultiple(1225));
        $this->assertSame('Bar, Qix', $stepTwo->checkIfMultiple(60025));
    }
    /* multiple 3-5-7 */
    public function testMultipleOfThreeFiveAndSevenShouldReturnFooBarQix()
    {
        $stepTwo = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix', $stepTwo->checkIfMultiple(105));
        $this->assertSame('Foo, Bar, Qix', $stepTwo->checkIfMultiple(525));
        $this->assertSame('Foo, Bar, Qix', $stepTwo->checkIfMultiple(1575));
        $this->assertSame('Foo, Bar, Qix', $stepTwo->checkIfMultiple(11025));
    }

    /**
     * STEP 3: APPENDING FOO, BAR OR QIX TO NUMBERS CONTAINING 3, 5 AND 7 RESPECTIVELY
    */
    /**
     * A: NUMBERS CONTAINING 3, 5, AND/OR 7
    */
    /* contains 3 */
    public function testNumberContainsThreeShouldReturnFoo()
    {
        $stepThreeA = new ServiceFooBarQix();
        $this->assertSame('Foo', $stepThreeA->checkIfContainsMultiple(13));
        $this->assertSame('Foo, Foo', $stepThreeA->checkIfContainsMultiple(33));
        $this->assertSame('Foo, Foo, Foo', $stepThreeA->checkIfContainsMultiple(343883));
    }
    /* contains 5 */
    public function testNumberContainsFiveShouldReturnBar()
    {
        $stepThreeA = new ServiceFooBarQix();
        $this->assertSame('Bar', $stepThreeA->checkIfContainsMultiple(15));
        $this->assertSame('Bar, Bar', $stepThreeA->checkIfContainsMultiple(55));
        $this->assertSame('Bar, Bar, Bar', $stepThreeA->checkIfContainsMultiple(51565));
    }
    /* contains 7 */
    public function testNumberContainsSevenShouldReturnQix()
    {
        $stepThreeA = new ServiceFooBarQix();
        $this->assertSame('Qix', $stepThreeA->checkIfContainsMultiple(17));
        $this->assertSame('Qix, Qix', $stepThreeA->checkIfContainsMultiple(77));
        $this->assertSame('Qix, Qix, Qix', $stepThreeA->checkIfContainsMultiple(7877));
    }
    /* contains 3-5 */
    public function testNumberContainsThreeAndFiveShouldReturnFooBar()
    {
        $stepThreeA = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar', $stepThreeA->checkIfContainsMultiple(35));
        $this->assertSame('Bar, Foo', $stepThreeA->checkIfContainsMultiple(5036));
        $this->assertSame('Bar, Foo, Bar', $stepThreeA->checkIfContainsMultiple(583445));
        $this->assertSame('Bar, Foo, Foo', $stepThreeA->checkIfContainsMultiple(522303));
    }
    /* contains 3-7 */
    public function testNumberContainsThreeAndSevenShouldReturnFooQix()
    {
        $stepThreeA = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix', $stepThreeA->checkIfContainsMultiple(37));
        $this->assertSame('Qix, Foo', $stepThreeA->checkIfContainsMultiple(7003));
        $this->assertSame('Qix, Foo, Qix', $stepThreeA->checkIfContainsMultiple(703007));
        $this->assertSame('Qix, Foo, Foo', $stepThreeA->checkIfContainsMultiple(713366));
    }
    /* contains 5-7 */
    public function testNumberContainsFiveAndSevenShouldReturnBarQix()
    {
        $stepThreeA = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix', $stepThreeA->checkIfContainsMultiple(57));
        $this->assertSame('Qix, Bar', $stepThreeA->checkIfContainsMultiple(7005));
        $this->assertSame('Qix, Bar, Qix', $stepThreeA->checkIfContainsMultiple(705070));
        $this->assertSame('Qix, Bar, Bar', $stepThreeA->checkIfContainsMultiple(705111115));
    }
    /* contains 3-5-7 */
    public function testNumberContainsThreeFiveAndSevenShouldReturnFooBarQix()
    {
        $stepThreeA = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix', $stepThreeA->checkIfContainsMultiple(357));
        $this->assertSame('Foo, Qix, Bar', $stepThreeA->checkIfContainsMultiple(37005));
        $this->assertSame('Foo, Qix, Bar, Foo, Qix', $stepThreeA->checkIfContainsMultiple(370053117));
        $this->assertSame('Bar, Foo, Qix', $stepThreeA->checkIfContainsMultiple(5311700));
        $this->assertSame('Bar, Qix, Foo', $stepThreeA->checkIfContainsMultiple(5117003));
        $this->assertSame('Bar, Qix, Foo, Foo, Qix', $stepThreeA->checkIfContainsMultiple(5111703307));
        $this->assertSame('Qix, Foo, Bar', $stepThreeA->checkIfContainsMultiple(7035));
        $this->assertSame('Qix, Bar, Foo', $stepThreeA->checkIfContainsMultiple(70511113));
        $this->assertSame('Qix, Bar, Foo, Foo, Qix, Bar', $stepThreeA->checkIfContainsMultiple(705311131715));
    }

    /**
     * B: MULTIPLES CONTAINING 3, 5, AND/OR 7
     */
    /* multiple 3 contains 3 */
    public function testMultipleOfThreeContainsTreeShouldReturnFooAppendFoo()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Foo', $stepThreeB->verifyNumberIsFooBarQix(3));
        $this->assertSame('Foo, Foo', $stepThreeB->verifyNumberIsFooBarQix(243));
    }
    /* multiple 3 contains 5 */
    public function testMultipleOfThreeContainsFiveShouldReturnFooAppendBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(6561));
        $this->assertSame('Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(59049));
    }
    /* multiple 3 contains 7 */
    public function testMultipleOfThreeContainsSevenShouldReturnFooAppendQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(27));
        $this->assertSame('Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(729));
    }
    /* multiple 3 contains 3-5 */
    public function testMultipleOfThreeContainsTreeAndFiveShouldReturnFooAppendFooBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(351));
        $this->assertSame('Foo, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(153));

    }
    /* multiple 3 contains 3-7 */
    public function testMultipleOfThreeContainsThreeAndSevenShouldReturnFooAppendFooQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(3117));
        $this->assertSame('Foo, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(7113));
    }
    /* multiple 3 contains 5-7 */
    public function testMultipleOfThreeContainsFiveAndSevenShouldReturnFooAppendBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(57));
        $this->assertSame('Foo, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(7521));
    }
    /* multiple 3 contains 3-5-7 */
    public function testMultipleOfThreeContainsThreeFiveAndSevenShouldReturnFooAppendFooBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Foo, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(3215721));
        $this->assertSame('Foo, Foo, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(3217521));
        $this->assertSame('Foo, Bar, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(5213721));
        $this->assertSame('Foo, Bar, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(5217321));
        $this->assertSame('Foo, Qix, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(7321521));
        $this->assertSame('Foo, Qix, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(7521321));
    }

    #############################################################################################
    /* multiple 5 contains 3 */
    public function testMultipleOfFiveContainsThreeShouldReturnBarAppendFoo()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(130));
        $this->assertSame('Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(310));
    }
    /* multiple 5 contains 5 */
    public function testMultipleOfFiveContainsFiveShouldReturnBarAppendBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Bar', $stepThreeB->verifyNumberIsFooBarQix(25));
        $this->assertSame('Bar, Bar', $stepThreeB->verifyNumberIsFooBarQix(125));
    }
    /* multiple 5 contains 7 */
    public function testMultipleOfFiveContainsSevenShouldReturnBarAppendQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(170));
        $this->assertSame('Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(710));
    }
    /* multiple 5 contains 3-5 */
    public function testMultipleOfFiveContainsThreeAndFiveShouldReturnBarAppendFooBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(325));
        $this->assertSame('Bar, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(5230));
    }
    /* multiple 5 contains 3-7 */
    public function testMultipleOfFiveContainsThreeAndSevenShouldReturnBarAppendFooQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(370));
        $this->assertSame('Bar, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(730));
    }
    /* multiple 5 contains 5-7 */
    public function testMultipleOfFiveContainsFiveAndSevenShouldReturnBarAppendBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(2570));
        $this->assertSame('Bar, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(275));
    }
    /* multiple 5 contains 3-5-7 */
    public function testMultipleOfFiveContainsThreeFiveAndSevenShouldReturnBarAppendFooBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Foo, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(35710));
        $this->assertSame('Bar, Foo, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(37150));
        $this->assertSame('Bar, Bar, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(53710));
        $this->assertSame('Bar, Bar, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(57310));
        $this->assertSame('Bar, Qix, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(73510));
        $this->assertSame('Bar, Qix, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(75310));
    }

    #################################################################################################
    /* multiple 7 contains 3 */
    public function testMultipleOfSevenContainsThreeShouldReturnQixAppendFoo()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(238));
        $this->assertSame('Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(301));
    }
    /* multiple 7 contains 5 */
    public function testMultipleOfSevenContainsFiveShouldReturnQixAppendBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(56));
        $this->assertSame('Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(5488));
    }
    /* multiple 7 contains 7 */
    public function testMultipleOfSevenContainsSevenShouldReturnQixAppendQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Qix, Qix', $stepThreeB->verifyNumberIsFooBarQix(7));
        $this->assertSame('Qix, Qix', $stepThreeB->verifyNumberIsFooBarQix(2744));
    }
    /* multiple 7 contains 3-5 */
    public function testMultipleOfSevenContainsThreeAndFiveShouldReturnQixAppendFooBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Qix, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(3052));
        $this->assertSame('Qix, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(532));
    }
    /* multiple 7 contains 3-7 */
    public function testMultipleOfSevenContainsThreeAndSevenShouldReturnQixAppendFooQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Qix, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(637));
        $this->assertSame('Qix, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(763));
    }
    /* multiple 7 contains 5-7 */
    public function testMultipleOfSevenContainsFiveAndSevenShouldReturnQixAppendBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Qix, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(1057));
        $this->assertSame('Qix, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(2758));
    }
    /* multiple 7 contains 3-5-7 */
    public function testMultipleOfSevenContainsThreeFiveAndSevenShouldReturnQixAppendFooBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Qix, Foo, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(35287));
        $this->assertSame('Qix, Foo, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(3752));
        $this->assertSame('Qix, Bar, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(5327));
        $this->assertSame('Qix, Bar, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(5873));
        $this->assertSame('Qix, Qix, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(73052));
        $this->assertSame('Qix, Qix, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(7532));
    }

    #################################################################################################
    /* multiple 3-5 contains 3 */
    public function testMultipleOfThreeAndFiveContainsThreeShouldReturnFooBarAppendFoo()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(30));
    }
    /* multiple 3-7 contains 3 */
    public function testMultipleOfThreeAndSevenContainsThreeShouldReturnFooQixAppendFoo()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(231));
    }
    /* multiple 5-7 contains 3 */
    public function testMultipleOfFiveAndSevenContainsThreeShouldReturnBarQixAppendFoo()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(3010));
    }
    /* multiple 3-5-7 contains 3 */
    public function testMultipleOfThreeFiveAndSevenContainsThreeShouldReturnFooBarQixAppendFoo()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(630));
    }

    #############################################################################################
    /* multiple 3-5 contains 5 */
    public function testMultipleOfThreeAndFiveContainsFiveShouldReturnFooBarAppendBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Bar', $stepThreeB->verifyNumberIsFooBarQix(15));
    }
    /* multiple 3-7 contains 5 */
    public function testMultipleOfThreeAndSevenContainsFiveShouldReturnFooQixAppendBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(504));
    }
    /* multiple 5-7 contains 5 */
    public function testMultipleOfFiveAndSevenContainsFiveShouldReturnBarQixAppendBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(245));
    }
    /* multiple 3-5-7 contains 5 */
    public function testMultipleOfThreeFiveAndSevenContainsFiveShouldReturnFooBarQixAppendBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(945));
    }

    ##########################################################################################
    /* multiple 3-5 contains 7 */
    public function testMultipleOfThreeAndFiveContainsSevenShouldReturnFooBarAppendQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(870));
    }
    /* multiple 3-7 contains 7 */
    public function testMultipleOfThreeAndSevenContainsSevenShouldReturnFooQixAppendQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix, Qix', $stepThreeB->verifyNumberIsFooBarQix(714));
    }
    /* multiple 5-7 contains 7 */
    public function testMultipleOfFiveAndSevenContainsSevenShouldReturnBarQixAppendQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix, Qix', $stepThreeB->verifyNumberIsFooBarQix(7210));
    }
    /* multiple 3-5-7 contains 7 */
    public function testMultipleOfThreeFiveAndSevenContainsSevenShouldReturnFooBarQixAppendQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix, Qix', $stepThreeB->verifyNumberIsFooBarQix(70140));
    }

    ############################################################################################
    /* multiple 3-5 contains 3-5 */
    public function testMultipleOfThreeAndFiveContainsTreeAndFiveShouldReturnFooBarAppendFooBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(345));
        $this->assertSame('Foo, Bar, Bar, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(15135));
    }
    /* multiple 3-5 contains 3-7 */
    public function testMultipleOfThreeAndFiveContainsThreeAndSevenShouldReturnFooBarAppendFooQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(13710));
        $this->assertSame('Foo, Bar, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(17310));
    }
    /* multiple 3-5 contains 5-7 */
    public function testMultipleOfThreeAndFiveContainsFiveAndSevenShouldReturnFooBarAppendBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(570));
        $this->assertSame('Foo, Bar, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(765));
    }
    /* multiple 3-5 contains 3-5-7 */
    public function testMultipleOfThreeAndFiveContainsTreeFiveAndSevenShouldReturnFooBarAppendFooBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Foo, Bar, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(13575));
        $this->assertSame('Foo, Bar, Foo, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(375));

    }

    ###############################################################################################
    /* multiple 3-7 contains 3-5 */
    public function testMultipleOfThreeAndSevenContainsThreeAndFiveShouldReturnFooQixAppendFooBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(13524));
        $this->assertSame('Foo, Qix, Bar, Foo, Foo', $stepThreeB->verifyNumberIsFooBarQix(1533));
        $this->assertSame('Foo, Qix, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(1953));
    }
    /* multiple 3-7 contains 3-7 */
    public function testMultipleOfThreeAndSevenContainsThreeAndSevenShouldReturnFooQixAppendFooQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(378));
        $this->assertSame('Foo, Qix, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(273));
    }
    /* multiple 3-7 contains 5-7 */
    public function testMultipleOfThreeAndSevenContainsFiveAndSevenShouldReturnFooQixAppendBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(567));
        $this->assertSame('Foo, Qix, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(756));
    }
    /* multiple 3-7 contains 3-5-7 */
    public function testMultipleOfThreeAndSevenContainsThreeFiveAndSevenShouldReturnFooQixAppendFooBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Qix, Foo, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(357));
        $this->assertSame('Foo, Qix, Qix, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(7539));
    }

    ###############################################################################################
    /* multiple 5-7 contains 3-5 */
    public function testMultipleOfFiveAndSevenContainsThreeAndFiveShouldReturnBarQixAppendFooBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(35));
        $this->assertSame('Bar, Qix, Bar, Foo', $stepThreeB->verifyNumberIsFooBarQix(5320));
    }
    /* multiple 5-7 contains 3-7 */
    public function testMultipleOfFiveAndSevenContainsThreeAndSevenShouldReturnBarQixAppendFooQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(13720));
        $this->assertSame('Bar, Qix, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(17360));
    }
    /* multiple 5-7 contains 5-7 */
    public function testMultipleOfFiveAndSevenContainsFiveAndSevenShouldReturnBarQixAppendBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix, Bar, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(5705));
        $this->assertSame('Bar, Qix, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(175));
    }
    /* multiple 5-7 contains 3-5-7 */
    public function testMultipleOfFiveAndSevenContainsThreeFiveAndSevenShouldReturnBarQixAppendFooBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Bar, Qix, Foo, Bar, Qix, Qix', $stepThreeB->verifyNumberIsFooBarQix(35770));
        $this->assertSame('Bar, Qix, Qix, Foo, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(73570));
    }

    ###############################################################################################
    /* multiple 3-5-7 contains 3-5 */
    public function testMultipleOfThreeFiveAndSevenContainsThreeAndFiveShouldReturnFooBarQixAppendFooBar()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(315));
        $this->assertSame('Foo, Bar, Qix, Bar, Foo, Foo', $stepThreeB->verifyNumberIsFooBarQix(15330));
    }
    /* multiple 3-5-7 contains 3-7 */
    public function testMultipleOfThreeFiveAndSevenContainsThreeAndSevenShouldReturnFooBarQixAppendFooQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix, Foo, Qix', $stepThreeB->verifyNumberIsFooBarQix(20370));
        $this->assertSame('Foo, Bar, Qix, Foo, Qix, Foo', $stepThreeB->verifyNumberIsFooBarQix(37380));
    }
    /* multiple 3-5-7 contains 5-7 */
    public function testMultipleOfThreeFiveAndSevenContainsFiveAndSevenShouldReturnFooBarQixAppendBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix, Bar, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(1575));
        $this->assertSame('Foo, Bar, Qix, Qix, Bar', $stepThreeB->verifyNumberIsFooBarQix(1785));
    }
    /* multiple 3-5-7 contains 3-5-7 */
    public function testMultipleOfThreeFiveAndSevenContainsThreeFiveAndSevenShouldReturnFooBarQixAppendFooBarQix()
    {
        $stepThreeB = new ServiceFooBarQix();
        $this->assertSame('Foo, Bar, Qix, Foo, Bar, Qix', $stepThreeB->verifyNumberIsFooBarQix(3570));
        $this->assertSame('Foo, Bar, Qix, Qix, Foo, Bar', $stepThreeB->verifyNumberIsFooBarQix(735));
        $this->assertSame('Foo, Bar, Qix, Foo, Qix, Bar, Bar', $stepThreeB->verifyNumberIsFooBarQix(13755));
    }
}

$coverage->stop();
(new HtmlReport)->process($coverage, '../build/coverage');