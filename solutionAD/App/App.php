<?php


class App
{

    public $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    private function getResult3()
    {
        $number3 = $this->number;
        $result = '';
        $number3 %= 3;
        if ($number3 == 0)
            $result .= 'Foo';
        return $result;
    }

    private function getResult5()
    {
        $number5 = $this->number;
        $result = '';
        $number5 %= 5;
        if ($number5 == 0)
            $result .= 'Bar';
        return $result;
    }

    private function getResult7()
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
        $result = '';
        $result .= $this->getResult3();

        if ($result !== '') {
            if ($this->getResult5() == 'Bar')
                $result .= ', ';
        }
        $result .= $this->getResult5();


        if ($result != '') {
            if ($this->getResult7() == 'Qix')
                $result .= ', ';
        }
        $result .= $this->getResult7();


        if ($result == '') {
            return $this->number;
        } else {
            return $result;
        }

    }
}
