<?php 

namespace App\Services;

class CalculationsService
{    

    protected const SEPERATOR = [
        ', ',
        '; '
    ];

    protected function calculateMultiples(int $givenNumber, array $returnValues,string $seperator): string
    {
        $result = [];

        foreach($returnValues as $key => $value)
        {
            if($givenNumber % $key === 0)
            {
                $result[] = $value;
            }
        }
        return empty($result) ? (string) $givenNumber : implode($seperator, $result);
    }

    protected function calculateOccurrences(int $givenNumber, array $returnValues, string $seperator): string
    {
        $result = [];
        
        $splittedGivenNumber = str_split($givenNumber);

        foreach($returnValues as $key => $value)
        {
            if(in_array($key, $splittedGivenNumber))
            {
                $result[] = $value;
            }
        }
        return implode($seperator, $result);
    }
}