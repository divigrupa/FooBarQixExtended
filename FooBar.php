<?php

class FooBar
{

    private function foo($given_number): string
    {
        $number_to_string = "";
        if ($given_number % 3 == 0) {
            $number_to_string = "Foo";
        }
        return $number_to_string;
    }

    private function bar($given_number): string
    {
        $number_to_string = "";
        if ($given_number % 5 == 0) {
            $number_to_string = "Bar";
        }
        return $number_to_string;
    }

    private function qix($given_number): string
    {
        $number_to_string = "";
        if ($given_number % 7 == 0) {
            $number_to_string = "Qix";
        }
        return $number_to_string;
    }

    public function fooBarQix($given_number): string
    {
        $functions_summary = $this->foo($given_number);
        $functions_summary .= $this->bar($given_number);
        $functions_summary .= $this->qix($given_number);

        if (strlen($functions_summary) == 0) {
            $functions_summary = $given_number;
        }
        return $functions_summary;
    }

}
