@echo off

set dirname=%~dp0
cls

"%dirname%/vendor/bin/phpunit" --configuration "%dirname%/phpunit.xml"