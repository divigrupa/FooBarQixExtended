<?php
function checkFooBar($number){
    //Check if a number is a positive integer
    if ((is_int($number) || ctype_digit($number)) && (int)$number > 0 ) { 
        //Check if a number is a multiple of 3
        if (($number % 3) == 0) {
            echo " Foo ";
        }
        //Check if a number is a multiple of 5
        if (($number % 5) == 0){
            echo " Bar ";
        }
        //Check if a number isn't a multiple of 3 or 5
        if ((($number % 5) !== 0) && (($number % 3) !== 0)) {
            echo "$number";
        } 
    } else {
        echo "Number is not a positive integer";
    }   
}
checkFooBar();

?>