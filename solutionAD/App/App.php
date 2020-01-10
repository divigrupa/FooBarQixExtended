<?php


class App
{

    public $number;

    public function __construct($number)
    {
        $this->number = $number;
    }


    public function getResult()
    {

        $result = '';
        $number3 = $this->number;
        $number3 %= 3;
        if ($number3 == 0)
            $result .= 'Foo';

        $number5 = $this->number;
        $number5 %= 5;
        if ($number5 == 0) {
            if ($result == 'Foo') {
                $result .= ', ';
            }
            $result .= 'Bar';
        }

        if ($result == '') {
            return $this->number;
        } else {
            return $result;
        }

    }
}


