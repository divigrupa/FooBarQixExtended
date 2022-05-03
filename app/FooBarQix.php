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

    public function occurrence(int $number): string
    {
        $result =[];

        foreach(str_split($number) as $digit)
        {
            if(in_array($digit, $this->multiples))
            {
                $result[] = array_search($digit, $this->multiples);
            }
        }
        return implode(', ',$result);
    }
}