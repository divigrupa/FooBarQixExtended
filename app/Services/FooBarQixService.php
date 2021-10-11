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
        foreach(self::RETURN_VALUES as $key => $returnValue)
        {
            if($givenNumber % $key === 0)
            {
                $result[] = $returnValue;
            }
        }
        return empty($result) ? (string) $givenNumber : implode(', ', $result);
    }

    public function getOccurrences(int $givenNumber): string
    {
        $result = [];
        $splittedGivenNumber = str_split($givenNumber,1);
        foreach(self::RETURN_VALUES as $key => $returnValue)
        {
            if(in_array($key, $splittedGivenNumber))
            {
                $result[] = $returnValue;
            }
        }
        return empty($result) ? (string) $givenNumber : implode(', ', $result);
    }
}