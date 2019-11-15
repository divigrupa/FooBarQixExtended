INTRO:

First of all, I must say this was a very interesting and invigorating assignment, it was a pleasure to undertake it.

I tried to keep things clean and organized and without too much repetition to the best of my ability. I am sure there are things that can be written in a different, more optimized way, and perhaps one day I will be able to do it as well.

I wrote separate scripts for both services, run_s1.php and run_s2.php accordingly. Both services use the same classes - Multiples and Occurrences with minor differences, such as different methods and/or values depending on true/false states. I left some minor things, such as checking for a positive integer, printing the value without transformation and checking the sum of digits, outside of classes and wrote them directly in the scripts.

There are tests for each service, test_s1.php and test_s2.php accordingly. I tried to cover as many test cases as I could think of to ensure both services work properly.

=============UPDATE 15.11.2019======================
I have added new tests for both classes. Tests are located in tests/unit and were run successfully with PHPUnit. Since this is the first time I've used PHPUnit (or written such tests for that matter), I followed the tutorial step by step and restructured all files into a new directory "app". I also added namespaces to Multiples class and Occurrences class.
I did not include the "vendor" directory, which contains PHPUnit, but I did keep 2 extra files - composer.json and phpunit.xml - because they contain some configuration settings I used to run the tests successfully.
=============UPDATE 15.11.2019======================

I used Powershell to run the scripts with these commands:

php myFiles/run_s1.php
php myFiles/run_s2.php
php myFiles/test_s1.php
php myFiles/test_s1.php

CONTENTS:

app/myFiles:

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

tests/unit:

    -> MultiplesTest.php
Contains tests for Multiples class. Since the methods of this class don't directly return the results, I tested for correct property/variable assignments, their combinations and correct separators being used, depending on the service used. Since multiple tests are run one after another, each test includes the necessary resets for states and input value to avoid errors.

    -> OccurrencesTest.php
Contains tests for Occurrences class. Since the methods of this class actualy do return results via echos, I tested for correct string values being returned. At this time, I only wrote tests for service 1, since service 2 pretty much uses the same methods, just in a different order.

-> composer.json
Contains my user settings for autoload.

-> phpunit.xml
Contains my user settings for PHPUnit.
