#!/bin/bash

scriptDirectory=$(cd `dirname $0` && pwd)

"${scriptDirectory}/vendor/bin/phpunit" --configuration "${scriptDirectory}/phpunit.xml"