<?php

namespace App;

Class FooBarQix
{
    private array $multiplesAndOccurrences = [
        "Foo" => 3,
        "Bar" => 5,
        "Qix" => 7
    ];

    public function multiple(int $number): string
    {
        $result = [];

        foreach ($this->multiplesAndOccurrences as $key => $multiple)
        {
            if($number % $multiple === 0)
            {
                $result[] = $key;
            }
        }
            return $this->implodeToString($result);
    }

    public function occurrence(int $number): string
    {
        $result = [];

        foreach(str_split($number) as $digit)
        {
            if(in_array($digit, $this->multiplesAndOccurrences))
            {
                $result[] = array_search($digit, $this->multiplesAndOccurrences);
            }
        }
        return $this->implodeToString($result);
    }

    public function multipleOrAndOccurrence(int $number): string
    {
        $result = [];

        if(!empty($this->multiple($number)))
        {
            $result[] = $this->multiple($number);
        }

        if (!empty($this->occurrence($number)))
        {
            $result[] = $this->occurrence($number);
        }

        if(count($result) < 1)
        {
            return (string)$number;
        } else {
            return $this->implodeToString($result);
        }
    }

    public function implodeToString(array $result): string
    {
        return implode(', ',$result);
    }
}