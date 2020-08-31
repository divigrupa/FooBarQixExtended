<?php

class FooBar {
    
     function Checker($Number):string
    {
        try {
        $Result = "";
            
            if ($Number % 3 == 0 && $Number % 5 == 0 && $Number % 7 ==0)
            $Result = "FooBarQix";
        
            elseif ($Number % 5 == 0 && $Number % 3==0)
            $Result = "FooBar";

            elseif ($Number % 5 == 0 && $Number % 7==0)
            $Result = "BarQix";

            elseif ($Number % 3 == 0 && $Number % 7==0)
            $Result = "FooQix";
            
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
 
        
    function FooBarAppend($number):string {
        $Result = $this -> Checker($number) ;
        $DigitArray = str_split($number);
        $Foo="";
        $Bar="";
        $Qix="";

        for ($i=0; $i<count($DigitArray); $i++){ 
                if ($DigitArray[$i]==3)
                $Foo=True;

                if ($DigitArray[$i]==5)
                $Bar=True;

                if ($DigitArray[$i]==7)
                $Qix=True;
        }

      $Result .= ($Foo == True  && $Bar == False  && $Qix == False) ?   "Foo"       :"";
      $Result .= ($Foo == False && $Bar == True   && $Qix == False) ?   "Bar"       :"";
      $Result .= ($Foo == False && $Bar == False  && $Qix == True)  ?   "Qix"       :"";
      $Result .= ($Foo == True  && $Bar == True   && $Qix == False) ?   "FooBar"    :"";
      $Result .= ($Foo == True  && $Bar == False  && $Qix == True)  ?   "FooQix"    :"";
      $Result .= ($Foo == False && $Bar == True   && $Qix == True)  ?   "BarQix"    :"";
      $Result .= ($Foo == True  && $Bar == True   && $Qix == True)  ?   "FooBarQix" :"";

    return $Result;
    }    
    }