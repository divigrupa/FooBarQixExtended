<?php 

namespace App\Services;

class FooBarQixService extends CalculationsService
{
    protected const RETURN_VALUES = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix'
    ];

    public function getMultiples(int $givenNumber): string
    {
        return $this->calculateMultiples($givenNumber, self::RETURN_VALUES, self::SEPERATOR[0]);
    }

    public function getOccurrences(int $givenNumber): string
    {
        return $this->calculateOccurrences($givenNumber, self::RETURN_VALUES, self::SEPERATOR[0]);
    }

    public function getMultiplesAndOccurrences($givenNumber): string
    {
       return $this->getMultiples($givenNumber) . ' ' . $this->getOccurrences($givenNumber);
    }
}