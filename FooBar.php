<?php

class FooBar
{

    private function foo($givenNumber): string
    {
        $numberToString = "";
        if ($givenNumber % 3 == 0) {
            $numberToString = "Foo";
        }
        return $numberToString;
    }

    private function bar($givenNumber): string
    {
        $numberToString = "";
        if ($givenNumber % 5 == 0) {
            $numberToString = "Bar";
        }
        return $numberToString;
    }

    private function qix($givenNumber): string
    {
        $numberToString = "";
        if ($givenNumber % 7 == 0) {
            $numberToString = "Qix";
        }
        return $numberToString;
    }

    public function fooBarQix($givenNumber): string
    {
        $functionSummary = $this->foo($givenNumber);
        $functionSummary .= $this->bar($givenNumber);
        $functionSummary .= $this->qix($givenNumber);

        if (strlen($functionSummary) == 0) {
            $functionSummary = $givenNumber;
        }
        return $functionSummary;
    }

}
$van = new FooBar();
echo $van->fooBarQix(3);
