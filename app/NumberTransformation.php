<?php

namespace App;
use App\Element;
class NumberTransformation
{
    private array $elements;
    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    public function execute(int $num): string
    {
        $result = [];
        foreach ($this->elements as $element) {
            if ($num % $element->getValue() == 0) {
                $result[] = $element->getName();
            }
        }
        if (!empty($result)) {
            return implode(',', $result);
        } else {
            return  strval($num);
        }
    }
}
