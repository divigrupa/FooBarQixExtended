<?php

use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';

require 'stepTwoFunctions.php';

class QixTest extends TestCase
{
    public function testQix()
    {
        $this->assertEquals('Qix', foobarqix(7));
        $this->assertEquals('Qix', foobarqix(14));
        $this->assertEquals('Qix', foobarqix(28));
    }

}