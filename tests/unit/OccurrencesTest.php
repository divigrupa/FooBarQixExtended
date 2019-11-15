<?php

require_once('App\myFiles\globals.php');

$input = 1;
$input_split = str_split($input, 1);



class OccurrencesTest extends \PHPUnit\Framework\TestCase {

    public function testCheckInputCase1() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 1;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "";

        $this->expectOutputString($expected);
    }

    public function testCheckInputCase3() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 3;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "Foo";

        $this->expectOutputString($expected);
    }

      public function testCheckInputCase5() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 5;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "Bar";

        $this->expectOutputString($expected);
    }

       public function testCheckInputCase7() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 7;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "Qix";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase35() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 35;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "FooBar";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase53() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 53;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "BarFoo";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase37() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 37;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "FooQix";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase73() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 73;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "QixFoo";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase57() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 57;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "BarQix";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase75() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 75;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "QixBar";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase357() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 357;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "FooBarQix";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase753() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 753;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "QixBarFoo";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase375() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 375;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "FooQixBar";

        $this->expectOutputString($expected);
    }

        public function testCheckInputCase677853597() {

        $test = new \App\myFiles\Occurrences;

        $GLOBALS['input'] = 677853597;
        $GLOBALS['input_split'] = str_split($GLOBALS['input'], 1);

        $test->checkOcc_s1();
        $expected = "QixQixBarFooBarQix";

        $this->expectOutputString($expected);
    }
    
    
    
    















}

?>
