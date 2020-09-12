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
            //Check if a number is a multiple of 5
            if (($number % 5) == 0)
            {
                $result .= "Bar";
            }
            //Check if a number isn't a multiple of 3 or 5
            if ((($number % 5) !== 0) && (($number % 3) !== 0))
            {
                $result = "$number";
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
