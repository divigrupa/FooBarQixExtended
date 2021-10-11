<?php 

namespace App\Services;

class FooBarService
{
    private const RETURN_VALUES = 
    [
        3 => "Foo",
        5 => "Bar"
    ];

    public function calculate(int $givenNumber)
    {
        $result = [];
        foreach(self::RETURN_VALUES as $key => $value)
        {
            if($givenNumber % $key === 0)
            {
                $result[] = $value;
            }
        }
        return empty($result) ? (string) $givenNumber : implode(', ', $result);
    }
}