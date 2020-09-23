<?php
class fooBar
{
    function checkFooBar($number)
    {
        $result = "";
        //Check if a number is a positive integer
        if ((is_int($number) || ctype_digit($number)) && (int)$number > 0)
        {
            //Check if a number is a multiple of 3
            if (($number % 3) == 0)
            {
                $result = "Foo ";
            }
            //Check if a number is a multiple of 5 and concatenate it
            if (($number % 5) == 0)
            {
                $result .= "Bar";
            }
            //If a number isn't a multiple of 3 or 5 convert it to string
            if ((($number % 5) !== 0) && (($number % 3) !== 0))
            {
                $result = strval($number);
            }
        }
        else
        {
            $result = "Number is not a positive integer";
        }
        return $result;
    }
}

?>
