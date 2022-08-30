@echo off

set dirname=%~dp0
cls

"%dirname%/vendor/bin/phpunit" --configuration "%dirname%/phpunit.xml" %1 %2 %3 %4 %5