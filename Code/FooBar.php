<?php
class FooBar {

     function Checker($Number):string
    {
        try {
        $Result = "";

            if ($Number % 3 == 0 && $Number % 5 == 0)
            $Result = "Foo, Bar";

            elseif ($Number % 5 == 0)
            $Result = "Bar";

            elseif ($Number % 3 == 0)
            $Result = "Foo";

            else 
            $Result = "";

            return 
            $Result ;
            }

            catch (Exception $e){
            return
            $Result = "";
            }
        }
    } 