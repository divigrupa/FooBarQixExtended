INTRO:

First of all, I must say this was a very interesting and invigorating assignment, it was a pleasure to undertake it.

I tried to keep things clean and organized and without too much repetition to the best of my ability. I am sure there are things that can be written in a different, more optimized way, and perhaps one day I will be able to do it as well.

I wrote separate scripts for both services, run_s1.php and run_s2.php accordingly. Both services use the same classes - Multiples and Occurrences with minor differences, such as different methods and/or values depending on true/false states. I left some minor things, such as checking for a positive integer, printing the value without transformation and checking the sum of digits, outside of classes and wrote them directly in the scripts.

There are tests for each service, test_s1.php and test_s2.php accordingly. I tried to cover as many test cases as I could think of to ensure both services work properly.

I used Powershell to run the scripts with these commands:

php myFiles/run_s1.php
php myFiles/run_s2.php
php myFiles/test_s1.php
php myFiles/test_s1.php

CONTENTS:

myFiles:

    -> globals.php
Contains a few global variables and states I use accross classes and scripts. The very first global variable $input holds the real input value used by both services. Changing this value will change the outcome of run_s1.php and run_s2.php when run.

    -> Multiples.php
Contains the parent class Multiples, responsible for finding multiples of $input. 

    -> Occurences.php
Contains the extended class Occurences, responsible for finding occurring digits of $input.

    -> README.txt
Contains, well, this :)

    -> run_s1.php
Executes FooBarQix or service1 (week1 & week2).

    -> run_s2.php
Executes InfQixFoo or service2 (week3, week4 & week5).

    -> test_s1.php
Executes tests for service1.

    -> test_s2.php
Executes tests for service2.
