<?php
require_once('globals.php');

class Occurrences extends Multiples
{
    public $fooOcc;
    public $barOcc;
    public $fooDiv;
    public $barDiv;
    public $qixDiv;

    public function setFooDiv() {
        $this->fooDiv = $GLOBALS['fooDivider'];
    }

    public function getFooDiv() {
        return $this->fooDiv;
    }

     public function setBarDiv() {
        $this->barDiv = $GLOBALS['barDivider'];
    }

    public function getBarDiv() {
        return $this->barDiv;
    }

    public function checkFooOcc() {
        $this->setFooDiv();
        foreach ($GLOBALS['input_split'] as $digit) {
            if ($digit == $this->getFooDiv()) {
            parent::setFoo();
            $this->fooOcc = parent::getFoo();
            array_push($GLOBALS['test_array'], $this->fooOcc);
            echo $this->fooOcc;
            }
        }
        return $this;
    }

    public function checkBarOcc() {
        $this->setBarDiv();
        foreach ($GLOBALS['input_split'] as $digit) {
            if ($digit == $this->getBarDiv()) {
            parent::setBar();
            $this->barOcc = parent::getBar();
            array_push($GLOBALS['test_array'], $this->barOcc);
            echo $this->barOcc;
            } 
        }
        return $this; 
    }

  

};


?>
