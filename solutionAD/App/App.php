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


    public function getResult()
    {
        if (!is_int($this->number)) {
            throw new Exception("FAIL:Enter integer Number");
        }
        if ($this->number < 0) {
            throw new Exception("ERROR:Enter positive number");
        }


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


        if ($result == '') {
            return strval($this->number);
        } else {
            return $result;
        }
    }
}