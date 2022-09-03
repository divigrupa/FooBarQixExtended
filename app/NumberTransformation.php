<?php

namespace App;
use App\Element;

class NumberTransformation
{
    private array $elementsForMultiplication;
    private ?array $elementsForOccurrences;


    public function __construct(array $elementsForMultiplication, ?array $elementsForOccurrences = null)
    {
        $this->elementsForMultiplication = $elementsForMultiplication;
        $this->elementsForOccurrences = $elementsForOccurrences;
    }

    public function execute(int $num): string
    {
        $splitNumber = str_split(strval($num));
        $result = [];
        foreach ($this->elementsForMultiplication as $element) {

            if ($num % $element->getValue() == 0) {
                $result[] = $element->getName();
            }
        }
        if (!empty($result)) {
            return implode(',', $result);
        } else {

            if (isset($this->elementsForOccurrences)) {
                foreach ($this->elementsForOccurrences as $element) {
                    $splitNumber = str_replace($element->getValue(), $element->getName(), $splitNumber);
                }
                $splitNumber = array_filter($splitNumber, function ($x) {
                    return !is_numeric($x);
                });
                return implode(',', $splitNumber);
            } else {
                return strval($num);
            }
        }
    }

}
