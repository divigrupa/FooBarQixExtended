<?php

require_once('App\myFiles\globals.php');


class FooBarQixTest extends \PHPUnit\Framework\TestCase {

    public function testThatWeCanSetAndReturnFoo() {
        $foo = new \App\myFiles\Multiples;

        $foo->setFoo();

        $this->assertEquals($foo->getFoo(), "Foo");
    }

    public function testcheckFooReturnsFoo() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 3;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkFoo()->foo, "Foo");


    }

     public function testcheckFooReturnsFooAgain() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 33;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkFoo()->foo, "Foo");


    }

        public function testcheckFooReturnsNull() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 1;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;

        $this->assertEquals($one->checkFoo()->foo, null);


    }

        public function testcheckBarReturnsBar() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 5;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkBar()->bar, "Bar");


    }

        public function testcheckBarReturnsBarAgain() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 555;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkBar()->bar, "Bar");


    }

       public function testcheckBarReturnsNull() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 1;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkBar()->bar, null);


    }

     public function testcheckQixReturnsQix() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 7;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkQix()->qix, 'Qix');


    }

       public function testcheckQixReturnsQixAgain() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 777;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkQix()->qix, 'Qix');


    }

        public function testcheckQixReturnsNull() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 1;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkQix()->qix, null);


    }

        public function testcheckInfReturnsNull() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 1;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkInf()->inf, null);


    }

    
        public function testcheckInfReturnsInf() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 8;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkInf()->inf, "Inf");


    }

        public function testcheckInfReturnsInfAgain() {


        $one = new \App\myFiles\Multiples;

        $GLOBALS['input'] = 88;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkInf()->inf, "Inf");


    }

         public function testIfFooOccurrenceIsGivencheckOcc_s1() {

            // since echo is used this actually prints out to the shell :)


        $one = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 33;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkOcc_s1()->fooOcc, "Foo");


    }

        public function testIfBarOccurrenceIsGivencheckOcc_s1() {

            // since echo is used this actually prints out to the shell :)


        $one = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 555;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkOcc_s1()->barOcc, "Bar");


    }

            public function testIfQixOccurrenceIsGivencheckOcc_s1() {

            // since echo is used this actually prints out to the shell :)


        $one = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 777;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);
        $GLOBALS['fooStatus'] = false;
        $GLOBALS['barStatus'] = false;
        $GLOBALS['qixStatus'] = false;


        $this->assertEquals($one->checkOcc_s1()->qixOcc, "Qix");


    }
    
    















}

?>
