<?php

require_once('App\myFiles\globals.php');


class MultiplesTest extends \PHPUnit\Framework\TestCase {

     public function testCheckInputCase1() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 1;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;

        $this->assertEquals($test->checkFoo()->foo, null);
        $this->assertEquals($test->checkBar()->bar, null);
        $this->assertEquals($test->checkQix()->qix, null);
        $this->assertEquals($test->checkInf()->inf, null);

    } 
    
    public function testCheckInputCase3() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 3;     
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkFoo()->foo, "Foo");
        $this->assertEquals($test->checkBar()->bar, null);
        $this->assertEquals($test->checkQix()->qix, null);
        $this->assertEquals($test->checkInf()->inf, null);

    }

        public function testCheckInputCase5() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 5;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;
     
        $this->assertEquals($test->checkFoo()->foo, null);
        $this->assertEquals($test->checkBar()->bar, "Bar");
        $this->assertEquals($test->checkQix()->qix, null);
        $this->assertEquals($test->checkInf()->inf, null);

    }

     public function testCheckInputCase7() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 7;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkFoo()->foo, null);
        $this->assertEquals($test->checkBar()->bar, null);
        $this->assertEquals($test->checkQix()->qix, 'Qix');
        $this->assertEquals($test->checkInf()->inf, null);

    }

        public function testCheckInputCase15() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 15;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkFoo()->foo, "Foo");
        $this->assertEquals($test->checkBar()->bar, ", Bar");
        $this->assertEquals($test->checkQix()->qix, null);
        $this->assertEquals($test->checkInf()->inf, null);

    }

        public function testCheckInputCase21() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 21;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkFoo()->foo, "Foo");
        $this->assertEquals($test->checkBar()->bar, null);
        $this->assertEquals($test->checkQix()->qix, ", Qix");
        $this->assertEquals($test->checkInf()->inf, null);

    }

        public function testCheckInputCase35() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 35;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkFoo()->foo, null);
        $this->assertEquals($test->checkBar()->bar, "Bar");
        $this->assertEquals($test->checkQix()->qix, ", Qix");
        $this->assertEquals($test->checkInf()->inf, null);

    }

        public function testCheckInputCase105() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 105;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkFoo()->foo, "Foo");
        $this->assertEquals($test->checkBar()->bar, ", Bar");
        $this->assertEquals($test->checkQix()->qix, ", Qix");
        $this->assertEquals($test->checkInf()->inf, null);

    }

        public function testCheckInputCase8() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 8;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkFoo()->foo, null);
        $this->assertEquals($test->checkBar()->bar, null);
        $this->assertEquals($test->checkQix()->qix, null);
        $this->assertEquals($test->checkInf()->inf, "Inf");

    }

        public function testCheckInputCase56() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 56;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkInf()->inf, "Inf");
        $this->assertEquals($test->checkQix()->qix, "; Qix");
        $this->assertEquals($test->checkFoo()->foo, null);
        $this->assertEquals($test->checkBar()->bar, null);    

    }

        public function testCheckInputCase24() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 24;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkInf()->inf, "Inf");
        $this->assertEquals($test->checkQix()->qix, null);
        $this->assertEquals($test->checkFoo()->foo, "; Foo");
        $this->assertEquals($test->checkBar()->bar, null);  

    }

        public function testCheckInputCase168() {

        $test = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 168;
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;
        $GLOBALS['infStatus'] = false;

        $this->assertEquals($test->checkInf()->inf, "Inf");
        $this->assertEquals($test->checkQix()->qix, "; Qix");
        $this->assertEquals($test->checkFoo()->foo, "; Foo");
        $this->assertEquals($test->checkBar()->bar, null);
        
    }
    
    















}

?>
