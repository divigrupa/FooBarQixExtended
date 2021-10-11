<?php 

namespace App\Services;

class InfQixFooService extends CalculationsService
{
    protected const RETURN_VALUES = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo'
    ];
    private int $givenNumber;
    private string $occurrences;
    private string $multiples;

    public function __construct(int $givenNumber)
    {   
        $this->givenNumber = $givenNumber;
        $this->occurrences = $this->calculateMultiples($givenNumber, self::RETURN_VALUES, self::SEPERATOR[1]);
        $this->multiples = $this->calculateOccurrences($givenNumber, self::RETURN_VALUES, self::SEPERATOR[1]);
    }

    private function getIfDigitSumIsMultipleOfEight(): string
    {
        if(array_sum(str_split($this->givenNumber))%8===0&& strlen($this->givenNumber)>1){
            return "Inf";
        }
        return '';
    }

    public function getMultiples(): string
    {
        return $this->occurrences . $this->getIfDigitSumIsMultipleOfEight();
    }

    public function getOccurrences(): string
    {
        return $this->multiples . $this->getIfDigitSumIsMultipleOfEight();
    }

    public function getMultiplesAndOccurrences(): string
    {
        $seperator = empty($this->multiples) ? '' : ' ';
        return $this->occurrences . $seperator . $this->multiples . $this->getIfDigitSumIsMultipleOfEight();
    }
}