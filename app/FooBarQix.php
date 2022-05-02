<?php

namespace App;

Class FooBarQix
{
    private int $multipleFirst = 3;
    private string $multipleResultFirst = 'Foo';
    private int $multipleSecond = 5;
    private string $multipleResultSecond = 'Bar';

    public function multiple(int $number): string
    {
        if($number % ($this->multipleFirst * $this->multipleSecond) === 0)
        {
            $result = "$this->multipleResultFirst, $this->multipleResultSecond";
        } else if($number % $this->multipleFirst === 0)
        {
            $result = $this->multipleResultFirst;
        } else if($number % $this->multipleSecond === 0)
        {
            $result = $this->multipleResultSecond;
        }
        else {
            $result = (string)$number;
        }
        return $result;
    }
}