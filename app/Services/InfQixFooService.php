<?php 

namespace App\Services;

class InfQixFooService extends CalculationsService
{
    protected const RETURN_VALUES = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo'
    ];


    public function getMultiples(int $givenNumber): string
    {
        return $this->calculateMultiples($givenNumber, self::RETURN_VALUES, self::SEPERATOR[1]);
    }

    public function getOccurrences(int $givenNumber): string
    {
        return $this->calculateOccurrences($givenNumber, self::RETURN_VALUES, self::SEPERATOR[1]);
    }

    public function getMultiplesAndOccurrences($givenNumber): string
    {
        return $this->getMultiples($givenNumber) . ' ' . $this->getOccurrences($givenNumber);
    }
}