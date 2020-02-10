<?php

class App
{
    public $number;

    public function __construct($number)
    {
        $this->number = $number;
    }


    private function getResultDividesBy3()
    {
        $number3 = $this->number;
        $result = '';
        $number3 %= 3;
        if ($number3 == 0)
            $result .= 'Foo';
        return $result;
    }

    private function getResultDividesBy5()
    {
        $number5 = $this->number;
        $result = '';
        $number5 %= 5;
        if ($number5 == 0)
            $result .= 'Bar';
        return $result;
    }

    private function getResultDividesBy7()
    {
        $number7 = $this->number;
        $result = '';
        $number7 %= 7;
        if ($number7 == 0)
            $result .= 'Qix';
        return $result;
    }


    public function getMultiple()
    {
        $result = '';
        $result .= $this->getResultDividesBy3();


        if ($result !== '') {
            if ($this->getResultDividesBy5() == 'Bar')
                $result .= ', ';
        }
        $result .= $this->getResultDividesBy5();


        if ($result != '') {
            if ($this->getResultDividesBy7() == 'Qix')
                $result .= ', ';
        }
        $result .= $this->getResultDividesBy7();
        return $result;
    }


    private function getContains()
    {
        $number = (string)$this->number;
        $numlength = strlen((string)abs($number));
        $result = '';
        $z = 0;
        $i = 1;
        while ($i <= $numlength) {
            $character=$number[$z];

            if ($character == 3) {
                $result .= 'Foo';
            } elseif ($character == 5) {
                $result .= 'Bar';
            } elseif ($character == 7) {
                $result .= 'Qix';
            }
            $z++;
            $i++;
        }
        return $result;
    }


    public function getOccurrences()
    {
        $result = '';
        $result .= $this->getContains();
        return $result;
    }


    public function getResult()
    {
        if (!is_int($this->number)) {
            throw new Exception("FAIL:Enter integer Number");
        }
        if ($this->number < 0) {
            throw new Exception("ERROR:Enter positive number");
        }


        if ($this->getMultiple() == '') {
            return strval($this->number);
        } else {
            return $this->getMultiple() . $this->getOccurrences();
        }
    }
}