<?php
use PHPUnit\Framework\TestCase;

class HomeWorkTest extends TestCase {
    public function testInclude()
    {
        include 'HomeWork.php';

        $this->assertTrue(true);
        return new HomeWork();
    }

    /**
     * @depends testInclude
     * @dataProvider taskProvider
     */
    public function testTask($value, $expection, $obj) {
        $this->assertSame($expection, $obj->task($value));
    }

    public function taskProvider()
    {
        return [
            'number is multiple of 3' => [3, 'Foo'],
            'number is multiple of 5' => [5, 'Bar'],
            'number has several multiples' => [15, 'Foo, Bar'],
            'number has not multiples' => [11, 11]
        ];
    }
}

?>
