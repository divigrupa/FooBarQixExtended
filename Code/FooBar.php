<?php

class FooBar {
    
     function Checker($Number):string
    {
        try {
        $Result = "";
            
            if ($Number % 3 == 0 && $Number % 5 == 0 && $Number % 7 ==0)
            $Result = "Foo, Bar, Qix";
        
            elseif ($Number % 5 == 0 && $Number % 3==0)
            $Result = "Foo, Bar";

            elseif ($Number % 5 == 0 && $Number % 7==0)
            $Result = "Bar, Qix";

            elseif ($Number % 3 == 0 && $Number % 7==0)
            $Result = "Foo, Qix";
            
            elseif ($Number % 3 == 0)
            $Result = "Foo";

            elseif ($Number % 5 == 0)
            $Result = "Bar";

            elseif ($Number % 7 == 0)
            $Result = "Qix";
        
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