<?php 

namespace App\Services;

class FooBarQixService
{
    private const RETURN_VALUES = 
    [
        3 => "Foo",
        5 => "Bar",
        7 => "Qix"
    ];

    public function getMultiples(int $givenNumber): string
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