<?php
namespace App\myFiles;
require_once('globals.php');

class Occurrences extends Multiples
{
    public $fooOcc;
    public $barOcc;
    public $qixOcc;
    public $infOcc;
    public $fooDiv;
    public $barDiv;
    public $qixDiv;
    public $infDiv;

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

     public function setQixDiv() {
        $this->qixDiv = $GLOBALS['qixDivider'];
    }

    public function getQixDiv() {
        return $this->qixDiv;
    }

     public function setInfDiv() {
        $this->infDiv = $GLOBALS['infDivider'];
    }

    public function getInfDiv() {
        return $this->infDiv;
    }

    public function checkOcc_s1() {
        $this->setFooDiv();
        $this->setBarDiv();
        $this->setQixDiv();
        foreach ($GLOBALS['input_split'] as $digit) {
            if ($digit == $this->getFooDiv()) {
            parent::setFoo();
            $this->fooOcc = parent::getFoo();
            array_push($GLOBALS['test_array'], $this->fooOcc);
            echo $this->fooOcc;
            } else {
                if ($digit == $this->getBarDiv()) {
                parent::setBar();
                $this->barOcc = parent::getBar();
                array_push($GLOBALS['test_array'], $this->barOcc);
                echo $this->barOcc;
            } else {
                if ($digit == $this->getQixDiv()) {
                parent::setQix();
                $this->qixOcc = parent::getQix();
                array_push($GLOBALS['test_array'], $this->qixOcc);
                echo $this->qixOcc;
                }
            }
        }
    }
    return $this;
}

    public function checkOcc_s2() {
        $this->setFooDiv();
        $this->setInfDiv();
        $this->setQixDiv();
        foreach ($GLOBALS['input_split'] as $digit) {
            if ($digit == $this->getFooDiv()) {
            parent::setFoo();
            $this->fooOcc = parent::getFoo();
            array_push($GLOBALS['test_array'], $this->fooOcc);
            echo $this->fooOcc;
            } else {
                if ($digit == $this->getInfDiv()) {
                parent::setInf();
                $this->infOcc = parent::getInf();
                array_push($GLOBALS['test_array'], $this->infOcc);
                echo $this->infOcc;
            } else {
                if ($digit == $this->getQixDiv()) {
                parent::setQix();
                $this->qixOcc = parent::getQix();
                array_push($GLOBALS['test_array'], $this->qixOcc);
                echo $this->qixOcc;
                }
            }
        }
    }
    return $this;
}

  

};


?>
