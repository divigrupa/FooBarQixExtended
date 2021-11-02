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
        $result = (new Multiplier('qix', 7))->isCompatible(14);
        $this->assertEquals('qix', $result);
    }


    public function test_getCompatibles(){

        $result = new MultipliersCollection([
            new Multiplier('foo', 3),
            new Multiplier('bar', 5),
            new Multiplier('qix', 7)
        ]);
        $result = $result->getCompatibles(105);

        $this->assertEquals('foo, bar, qix', $result);

        $result = new MultipliersCollection([
            new Multiplier('foo', 3),
            new Multiplier('bar', 5),
            new Multiplier('qix', 7)
        ]);
        $result = $result->getCompatibles(10);

        $this->assertEquals('bar', $result);

        $result = new MultipliersCollection([
            new Multiplier('foo', 3),
            new Multiplier('bar', 5),
            new Multiplier('qix', 7)
        ]);
        $result = $result->getCompatibles(1);

        $this->assertEquals('1', $result);

        $result = new MultipliersCollection([
            new Multiplier('inf', 8),
            new Multiplier('qix', 7),
            new Multiplier('foo', 3)
        ], ';');
        $result = $result->getCompatibles(168);

        $this->assertEquals('inf;qix;foo', $result);



    }

    public function test_getCompatiblesIfAppends(){

        $result = new MultipliersCollection([
            new Multiplier('foo', 3),
            new Multiplier('bar', 5),
            new Multiplier('qix', 7)
        ]);
        $result = $result->getCompatiblesIfAppends(357);

        $this->assertEquals('foo, bar, qix', $result);

        $result = new MultipliersCollection([
            new Multiplier('foo', 3),
            new Multiplier('bar', 5),
            new Multiplier('qix', 7)
        ]);
        $result = $result->getCompatiblesIfAppends(1);

        $this->assertEquals('1', $result);

        $result = new MultipliersCollection([
            new Multiplier('inf', 8),
            new Multiplier('qix', 7),
            new Multiplier('foo', 3)
        ], ';');
        $result = $result->getCompatiblesIfAppends(64);

        $this->assertEquals('64', $result);


    }



}
