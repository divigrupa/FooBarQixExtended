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
        $this->assertSame($expection, $obj->Task($value));
    }

    /**
     * @depends testInclude
     */
    public function testNegativeIntegerException($obj) {
        $this->expectException(InvalidArgumentException::class);
        $obj->Task(-1);
    }

    public function taskProvider()
    {
        return [
            'number is multiple of 3' => [3, 'Foo'],
            'number is multiple of 5' => [5, 'Bar'],
            'number is multiple of 7' => [7, 'Qix'],
            'number is multiple of 3 and 5' => [15, 'Foo, Bar'],
            'number is multiple of 3 and 7' => [21, 'Foo, Qix'],
            'number is multiple of 5 and 7' => [35, 'Bar, Qix'],
            'number is multiple of 3, 5 and 7' => [105, 'Foo, Bar, Qix'],
            'number has not multiples' => [11, '11']
        ];
    }
}

?>
