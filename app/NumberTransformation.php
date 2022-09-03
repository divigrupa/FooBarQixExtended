<?php

namespace App;

use App\Element;

class NumberTransformation
{
    private array $elementsForMultiplication;
    private string $separator;
    private ?array $elementsForOccurrences;


    public function __construct(
        array  $elementsForMultiplication,
        string $separator = ',',
        ?array $elementsForOccurrences = null

    )
    {
        $this->elementsForMultiplication = $elementsForMultiplication;
        $this->elementsForOccurrences = $elementsForOccurrences;
        $this->separator = $separator;
    }

    public function execute(int $num): string
    {
        $splitNumber = str_split(strval($num));
        $occurring = '';
        $result = [];

        //Search number for reoccurring numbers and returns string. If elements isn't set then default value is left.

        if (isset($this->elementsForOccurrences)) {
            foreach ($this->elementsForOccurrences as $element) {
                $splitNumber = str_replace($element->getValue(), $element->getName(), $splitNumber);
            }
            $changedNumbers = array_filter($splitNumber, function ($x) {
                return !is_numeric($x);
            });
            $occurring = implode($this->separator, $changedNumbers);
        }

        //Checking number for divisions if number can be divided by given value, returns string with name.

        foreach ($this->elementsForMultiplication as $element) {
            if ($num % $element->getValue() == 0) {
                $result[] = $element->getName();
            }
        }

        if (!empty($result)) {
            return ($occurring == '') ?
                implode($this->separator, $result) . $occurring :
                implode($this->separator, $result) . $this->separator . $occurring;
        } else {
            if (isset($this->elementsForOccurrences)) {
                return implode($this->separator, $result) . $occurring;
            } else {
                return strval($num);
            }
        }
    }

}
