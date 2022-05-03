<?php

namespace App;

Class FooBarQix
{
    private array $multiples = [
        "Foo" => 3,
        "Bar" => 5,
        "Qix" => 7
    ];

    public function multiple(int $number): string
    {
        $result =[];

        foreach ($this->multiples as $key => $multiple)
        {
            if($number % $multiple === 0)
            {
                $result[] = $key;
            }
        }

        if(count($result) < 1)
        {
            return (string)$number;
        }else {
            return implode(', ',$result);
        }
    }
}