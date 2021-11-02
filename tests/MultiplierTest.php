<?php


use App\Models\Collections\MultipliersCollection;
use App\Models\Multiplier;
use PHPUnit\Framework\TestCase;

class MultiplierTest extends TestCase{


    public function test_isCompatible(){

        $result = (new Multiplier('foo', 3))->isCompatible(12);
        $this->assertEquals('foo', $result);
        $result = (new Multiplier('bar', 5))->isCompatible(5);
        $this->assertEquals('bar', $result);
        $result = (new Multiplier('bar', 5))->isCompatible(1);
        $this->assertEquals(NULL, $result);
    }


    public function test_getCompatibles(){

        $result = new MultipliersCollection([
            new Multiplier('foo', 3),
            new Multiplier('bar', 5),
        ]);
        $result = $result->getCompatibles(15);

        $this->assertEquals('foo, bar', $result);

        $result = new MultipliersCollection([
            new Multiplier('foo', 3),
            new Multiplier('bar', 5),
        ]);
        $result = $result->getCompatibles(10);

        $this->assertEquals('bar', $result);

        $result = new MultipliersCollection([
            new Multiplier('foo', 3),
            new Multiplier('bar', 5),
        ]);
        $result = $result->getCompatibles(1);

        $this->assertEquals('1', $result);


    }



}
