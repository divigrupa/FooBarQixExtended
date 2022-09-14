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
     * @dataProvider taskMultipleProvider
     * @dataProvider taskContainProvider
     * @dataProvider taskBothFunctionalityProvider
     * @dataProvider taskOtherProvider
     */
    public function testTask($value, $expection, $obj) {
        $this->assertSame($expection, $obj->Task($value));
    }

    /**
     * @depends testInclude
     * @dataProvider taskMultipleProvider
     */
    public function testMultipleCheckTask($value, $expection, $obj) {
        $this->assertSame($expection, $obj->MultipleCheckTask($value));
    }

    /**
     * @depends testInclude
     * @dataProvider taskContainProvider
     */
    public function testContainCheckTask($value, $expection, $obj) {
        $this->assertSame($expection, $obj->ContainCheckTask($value));
    }

    /**
     * @depends testInclude
     */
    public function testNegativeIntegerException($obj) {
        $this->expectException(InvalidArgumentException::class);
        $obj->Task(-1);
    }

    public function taskMultipleProvider()
    {
        return [
            'number is multiple of 3 and without contains' => [6, 'Foo'],
            'number is multiple of 5 and without contains' => [10, 'Bar'],
            'number is multiple of 7 and without contains' => [14, 'Qix'],
            'number is multiple of 3 and 5 and without contains' => [60, 'Foo, Bar'],
            'number is multiple of 3 and 7 and without contains' => [21, 'Foo, Qix'],
            'number is multiple of 5 and 7 and without contains' => [140, 'Bar, Qix'],
            'number is multiple of 3, 5 and 7 and without contains' => [210, 'Foo, Bar, Qix'],
        ];
    }

    public function taskContainProvider()
    {
        return [

            'number contains 3 and without multiples' => [13, 'Foo'],
            'number contains two 3 and without multiples' => [313, 'Foo, Foo'],

            'number contains 5 and without multiples' => [51, 'Bar'],
            'number contains two 5 and without multiples' => [551, 'Bar, Bar'],

            'number contains 7 and without multiples' => [17, 'Qix'],
            'number contains two 7 and without multiples' => [277, 'Qix, Qix'],

            'number contains 3 and 5 and without multiples' => [53, 'Bar, Foo'],
            'number contains several 3 and 5 and without multiples' => [353, 'Foo, Bar, Foo'],

            'number contains 3 and 7 and without multiples' => [73, 'Qix, Foo'],
            'number contains several 3 and 7 and without multiples' => [373, 'Foo, Qix, Foo'],

            'number contains 5 and 7 and without multiples' => [57, 'Bar, Qix'],
            'number contains several 5 and 7 and without multiples' => [373, 'Foo, Qix, Foo'],

            'number contains 3, 5 and 7 and without multiples' => [5537, 'Bar, Bar, Foo, Qix'],
        ];
    }


    public function taskBothFunctionalityProvider()
    {
        return [

            'number contains 3 and is multiple of 3' => [3, 'Foo, Foo'],
            'number contains 3 and is multiple of 5' => [130, 'Bar, Foo'],
            'number contains 3 and is multiple of 7' => [203, 'Qix, Foo'],
            'number contains 3 and is multiple of 3 and 5' => [30, 'Foo, Bar, Foo'],
            'number contains 3 and is multiple of 3 and 7' => [63, 'Foo, Qix, Foo'],
            'number contains 3 and is multiple of 5 and 7' => [2030, 'Bar, Qix, Foo'],
            'number contains 3 and is multiple of 3, 5 and 7' => [630, 'Foo, Bar, Qix, Foo'],

            'number contains 5 and is multiple of 3' => [51, 'Foo, Bar'],
            'number contains 5 and is multiple of 5' => [5, 'Bar, Bar'],
            'number contains 5 and is multiple of 7' => [56, 'Qix, Bar'],
            'number contains 5 and is multiple of 3 and 5' => [15, 'Foo, Bar, Bar'],
            'number contains 5 and is multiple of 3 and 7' => [252, 'Foo, Qix, Bar'],
            'number contains 5 and is multiple of 5 and 7' => [245, 'Bar, Qix, Bar'],
            'number contains 5 and is multiple of 3, 5 and 7' => [105, 'Foo, Bar, Qix, Bar'],

            'number contains 7 and is multiple of 3' => [27, 'Foo, Qix'],
            'number contains 7 and is multiple of 5' => [170, 'Bar, Qix'],
            'number contains 7 and is multiple of 7' => [7, 'Qix, Qix'],
            'number contains 7 and is multiple of 3 and 5' => [720, 'Foo, Bar, Qix'],
            'number contains 7 and is multiple of 3 and 7' => [147, 'Foo, Qix, Qix'],
            'number contains 7 and is multiple of 5 and 7' => [70, 'Bar, Qix, Qix'],
            'number contains 7 and is multiple of 3, 5 and 7' => [1470, 'Foo, Bar, Qix, Qix'],


            'number contains 3, 5 and is multiple of 3' => [153, 'Foo, Bar, Foo'],
            'number contains 3, 5 and is multiple of 5' => [235, 'Bar, Foo, Bar'],
            'number contains 3, 5 and is multiple of 7' => [532, 'Qix, Bar, Foo'],
            'number contains 3, 5 and is multiple of 3 and 5' => [135, 'Foo, Bar, Foo, Bar'],
            'number contains 3, 5 and is multiple of 3 and 7' => [1533, 'Foo, Qix, Bar, Foo. Foo'],
            'number contains 3, 5 and is multiple of 5 and 7' => [35, 'Bar, Qix, Foo, Bar'],
            'number contains 3, 5 and is multiple of 3, 5 and 7' => [315, 'Foo, Bar, Qix, Foo, Bar'],

            'number contains 3, 7 and is multiple of 3' => [237, 'Foo, Foo, Qix'],
            'number contains 3, 7 and is multiple of 5' => [370, 'Bar, Foo, Qix'],
            'number contains 3, 7 and is multiple of 7' => [371, 'Qix, Foo, Qix'],
            'number contains 3, 7 and is multiple of 3 and 5' => [2370, 'Foo, Bar, Foo, Qix'],
            'number contains 3, 7 and is multiple of 3 and 7' => [273, 'Foo, Qix, Qix, Foo'],
            'number contains 3, 7 and is multiple of 5 and 7' => [3710, 'Bar, Qix, Foo, Qix'],
            'number contains 3, 7 and is multiple of 3, 5 and 7' => [2730, 'Foo, Bar, Qix, Qix, Foo'],

            'number contains 5, 7 and is multiple of 3' => [57, 'Foo, Bar, Qix'],
            'number contains 5, 7 and is multiple of 5' => [275, 'Bar, Qix, Bar'],
            'number contains 5, 7 and is multiple of 7' => [574, 'Qix, Bar, Qix'],
            'number contains 5, 7 and is multiple of 3 and 5' => [75, 'Foo, Bar, Qix, Bar'],
            'number contains 5, 7 and is multiple of 3 and 7' => [567, 'Foo, Qix, Bar, Qix'],
            'number contains 5, 7 and is multiple of 5 and 7' => [175, 'Bar, Qix, Qix, Bar'],
            'number contains 5, 7 and is multiple of 3, 5 and 7' => [1785, 'Foo, Bar, Qix, Qix, Bar'],

            'number contains 3, 5, 7 and is multiple of 3' => [537, 'Foo, Bar, Foo, Qix'],
            'number contains 3, 5, 7 and is multiple of 5' => [1375, 'Bar, Foo, Qix, Bar'],
            'number contains 3, 5, 7 and is multiple of 7' => [3157, 'Qix, Foo, Bar, Qix'],
            'number contains 3, 5, 7 and is multiple of 3 and 5' => [375, 'Foo, Bar, Foo, Qix, Bar'],
            'number contains 3, 5, 7 and is multiple of 3 and 7' => [357, 'Foo, Qix, Foo, Bar, Qix'],
            'number contains 3, 5, 7 and is multiple of 5 and 7' => [3745, 'Bar, Qix, Foo, Qix, Bar'],
            'number contains 3, 5, 7 and is multiple of 3, 5 and 7' => [735, 'Foo, Bar, Qix, Qix, Foo, Bar']
        ];
    }


    public function taskOtherProvider()
    {
        return [
            'number has not multiples' => [11, '11']
        ];
    }

}

?>
