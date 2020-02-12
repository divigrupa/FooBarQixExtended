<?php

class App
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    private function getResultDividesBy3()
    {
        if ($this->number % 3 === 0) {
            return 'Foo';
        }
    }

    private function getResultDividesBy5()
    {
        if ($this->number % 5 === 0) {
            return 'Bar';
        }
    }

    private function getResultDividesBy7()
    {
        if ($this->number % 7 === 0) {
            return 'Qix';
        }
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
            $character = $number[$z];

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
        return $this->getContains();
    }

    public function validate()
    {
        if (!is_int($this->number)) {
            throw new Exception('FAIL:Enter integer Number');
        }
        if ($this->number < 0) {
            throw new Exception('ERROR:Enter positive number');
        }
    }

    public function getResult()
    {
        return ($this->getMultiple() === '') ? $this->number : $this->getMultiple() . $this->getOccurrences();
    }
}