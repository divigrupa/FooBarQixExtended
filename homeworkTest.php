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
     * @dataProvider taskFooBarQixMultipleProvider
     * @dataProvider taskFooBarQixContainProvider
     * @dataProvider taskFooBarQixBothFunctionalityProvider
     * @dataProvider taskOtherProvider
     */
    public function testFooBarQixTask($value, $expection, $obj) {
        $this->assertSame($expection, $obj->Task($value));
    }

    /**
     * @depends testInclude
     * @dataProvider taskFooBarQixMultipleProvider
     */
    public function testFooBarQixMultipleCheckTask($value, $expection, $obj) {
        $arr = $obj->MultipleCheckTask($value, [3 => 'Foo', 5 => 'Bar', 7 => 'Qix']);
        $this->assertSame($expection, join(', ', $arr));
    }

    /**
     * @depends testInclude
     * @dataProvider taskFooBarQixContainProvider
     */
    public function testFooBarQixContainCheckTask($value, $expection, $obj) {
        $arr = $obj->ContainCheckTask($value, [3 => 'Foo', 5 => 'Bar', 7 => 'Qix']);
        $this->assertSame($expection, join(', ', $arr));
    }

   /**
     * @depends testInclude
     * @dataProvider taskInfQixFooMultipleProvider
     * @dataProvider taskInfQixFooContainProvider
     * @dataProvider taskInfQixFooBothFunctionalityProvider
     * @dataProvider taskInfQixFooDigitSumProvider
     * @dataProvider taskOtherProvider
     */
    public function testInfQixFooTask($value, $expection, $obj) {
        $this->assertSame($expection, $obj->NewTask($value));
    }

    /**
     * @depends testInclude
     * @dataProvider taskInfQixFooMultipleProvider
     */
    public function testInfQixFooMultipleCheckTask($value, $expection, $obj) {
        $arr = $obj->MultipleCheckTask($value, [8 => 'Inf', 7 => 'Qix', 3 => 'Foo']);
        $this->assertSame($expection, join('; ', $arr));
    }

    /**
     * @depends testInclude
     * @dataProvider taskInfQixFooContainProvider
     */
    public function testInfQixFooContainCheckTask($value, $expection, $obj) {
        $arr = $obj->ContainCheckTask($value, [8 => 'Inf', 7 => 'Qix', 3 => 'Foo']);
        $this->assertSame($expection, join('; ', $arr));
    }

    /**
     * @depends testInclude
     * @dataProvider taskDigitSumProvider
     */
    public function testSumDigits($value, $expection, $obj) {
        $this->assertSame($expection, $obj->SumDigits($value));
    }

    /**
     * @depends testInclude
     */
    public function testNegativeIntegerException($obj) {
        $this->expectException(InvalidArgumentException::class);
        $obj->Task(-1);
    }



    public function taskFooBarQixMultipleProvider()
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


    public function taskInfQixFooMultipleProvider()
    {
        return [
            'number is multiple of 3 and without contains' => [6, 'Foo'],
            'number is multiple of 8 and without contains' => [16, 'Inf'],
            'number is multiple of 7 and without contains' => [14, 'Qix'],
            'number is multiple of 3 and 8 and without contains' => [24, 'Inf; Foo'],
            'number is multiple of 3 and 7 and without contains' => [21, 'Qix; Foo'],
            'number is multiple of 8 and 7 and without contains' => [56, 'Inf; Qix'],
            'number is multiple of 3, 8 and 7 and without contains' => [504, 'Inf; Qix; Foo'],
        ];
    }

    public function taskFooBarQixContainProvider()
    {
        return [

            'number contains 3 and without multiples' => [13, 'Foo'],
            'number contains two 3 and without multiples' => [313, 'Foo, Foo'],

            'number contains 5 and without multiples' => [52, 'Bar'],
            'number contains two 5 and without multiples' => [551, 'Bar, Bar'],

            'number contains 7 and without multiples' => [17, 'Qix'],
            'number contains two 7 and without multiples' => [277, 'Qix, Qix'],

            'number contains 3 and 5 and without multiples' => [53, 'Bar, Foo'],
            'number contains several 3 and 5 and without multiples' => [353, 'Foo, Bar, Foo'],

            'number contains 3 and 7 and without multiples' => [73, 'Qix, Foo'],
            'number contains several 3 and 7 and without multiples' => [373, 'Foo, Qix, Foo'],

            'number contains 5 and 7 and without multiples' => [157, 'Bar, Qix'],
            'number contains several 5 and 7 and without multiples' => [757, 'Qix, Bar, Qix'],

            'number contains 3, 5 and 7 and without multiples' => [5371, 'Bar, Foo, Qix'],
        ];
    }

    public function taskInfQixFooContainProvider()
    {
        return [

            'number contains 3 and without multiples' => [13, 'Foo'],
            'number contains two 3 and without multiples' => [313, 'Foo; Foo'],

            'number contains 8 and without multiples' => [82, 'Inf'],
            'number contains two 8 and without multiples' => [881, 'Inf; Inf'],

            'number contains 7 and without multiples' => [47, 'Qix'],
            'number contains two 7 and without multiples' => [577, 'Qix; Qix'],

            'number contains 3 and 8 and without multiples' => [83, 'Inf; Foo'],
            'number contains several 3 and 8 and without multiples' => [383, 'Foo; Inf; Foo'],

            'number contains 3 and 7 and without multiples' => [73, 'Qix; Foo'],
            'number contains several 3 and 7 and without multiples' => [373, 'Foo; Qix; Foo'],

            'number contains 8 and 7 and without multiples' => [487, 'Inf; Qix'],
            'number contains several 8 and 7 and without multiples' => [787, 'Qix; Inf; Qix'],

            'number contains 3, 8 and 7 and without multiples' => [8371, 'Inf; Foo; Qix'],
        ];
    }



    public function taskFooBarQixBothFunctionalityProvider()
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
            'number contains 3, 5 and is multiple of 3 and 7' => [1533, 'Foo, Qix, Bar, Foo, Foo'],
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


    public function taskInfQixFooBothFunctionalityProvider()
    {
        return [

            'number contains 3 and is multiple of 3' => [3, 'Foo; Foo'],
            'number contains 3 and is multiple of 8' => [136, 'Inf; Foo'],
            'number contains 3 and is multiple of 7' => [203, 'Qix; Foo'],
            'number contains 3 and is multiple of 3 and 8' => [312, 'Inf; Foo; Foo'],
            'number contains 3 and is multiple of 3 and 7' => [63, 'Qix; Foo; Foo'],
            'number contains 3 and is multiple of 8 and 7' => [392, 'Inf; Qix; Foo'],
            'number contains 3 and is multiple of 3, 8 and 7' => [1344, 'Inf; Qix; Foo; Foo'],

            'number contains 8 and is multiple of 3' => [18, 'Foo; Inf'],
            'number contains 8 and is multiple of 8' => [248, 'Inf; Inf'],
            'number contains 8 and is multiple of 7' => [28, 'Qix; Inf'],
            'number contains 8 and is multiple of 3 and 8' => [48, 'Inf; Foo; Inf'],
            'number contains 8 and is multiple of 3 and 7' => [84, 'Qix; Foo; Inf'],
            'number contains 8 and is multiple of 8 and 7' => [280, 'Inf; Qix; Inf'],
            'number contains 8 and is multiple of 3, 8 and 7' => [840, 'Inf; Qix; Foo; Inf'],

            'number contains 7 and is multiple of 3' => [27, 'Foo; Qix'],
            'number contains 7 and is multiple of 8' => [176, 'Inf; Qix'],
            'number contains 7 and is multiple of 7' => [7, 'Qix; Qix'],
            'number contains 7 and is multiple of 3 and 8' => [72, 'Inf; Foo; Qix'],
            'number contains 7 and is multiple of 3 and 7' => [147, 'Qix; Foo; Qix'],
            'number contains 7 and is multiple of 8 and 7' => [1792, 'Inf; Qix; Qix'],
            'number contains 7 and is multiple of 3, 8 and 7' => [672, 'Inf; Qix; Foo; Qix'],


            'number contains 3, 8 and is multiple of 3' => [183, 'Foo; Inf; Foo'],
            'number contains 3, 8 and is multiple of 8' => [328, 'Inf; Foo; Inf'],
            'number contains 3, 8 and is multiple of 7' => [238, 'Qix; Foo; Inf'],
            'number contains 3, 8 and is multiple of 3 and 8' => [384, 'Inf; Foo; Foo; Inf'],
            'number contains 3, 8 and is multiple of 3 and 7' => [483, 'Qix; Foo; Inf; Foo'],
            'number contains 3, 8 and is multiple of 8 and 7' => [3080, 'Inf; Qix; Foo; Inf'],
            'number contains 3, 8 and is multiple of 3, 8 and 7' => [3528, 'Inf; Qix; Foo; Foo; Inf'],

            'number contains 3, 7 and is multiple of 3' => [237, 'Foo; Foo; Qix'],
            'number contains 3, 7 and is multiple of 8' => [1376, 'Inf; Foo; Qix'],
            'number contains 3, 7 and is multiple of 7' => [371, 'Qix; Foo; Qix'],
            'number contains 3, 7 and is multiple of 3 and 8' => [2376, 'Inf; Foo; Foo; Qix'],
            'number contains 3, 7 and is multiple of 3 and 7' => [357, 'Qix; Foo; Foo; Qix'],
            'number contains 3, 7 and is multiple of 8 and 7' => [1736, 'Inf; Qix; Qix; Foo'],
            'number contains 3, 7 and is multiple of 3, 8 and 7' => [5376, 'Inf; Qix; Foo; Foo; Qix'],

            'number contains 8, 7 and is multiple of 3' => [87, 'Foo; Inf; Qix'],
            'number contains 8, 7 and is multiple of 8' => [872, 'Inf; Inf; Qix'],
            'number contains 8, 7 and is multiple of 7' => [287, 'Qix; Inf; Qix'],
            'number contains 8, 7 and is multiple of 3 and 8' => [768, 'Inf; Foo; Qix; Inf'],
            'number contains 8, 7 and is multiple of 3 and 7' => [1785, 'Qix; Foo; Qix; Inf'],
            'number contains 8, 7 and is multiple of 8 and 7' => [728, 'Inf; Qix; Qix; Inf'],
            'number contains 8, 7 and is multiple of 3, 8 and 7' => [4872, 'Inf; Qix; Foo; Inf; Qix'],

            'number contains 3, 8, 7 and is multiple of 3' => [387, 'Foo; Foo; Inf; Qix'],
            'number contains 3, 8, 7 and is multiple of 8' => [3872, 'Inf; Foo; Inf; Qix'],
            'number contains 3, 8, 7 and is multiple of 7' => [2387, 'Qix; Foo; Inf; Qix'],
            'number contains 3, 8, 7 and is multiple of 3 and 8' => [13728, 'Inf; Foo; Foo; Qix; Inf'],
            'number contains 3, 8, 7 and is multiple of 3 and 7' => [378, 'Qix; Foo; Foo; Qix; Inf'],
            'number contains 3, 8, 7 and is multiple of 8 and 7' => [27328, 'Inf; Qix; Qix; Foo; Inf'],
            'number contains 3, 8, 7 and is multiple of 3, 8 and 7' => [33768, 'Inf; Qix; Foo; Foo; Foo; Qix; Inf']
        ];
    }

    public function taskInfQixFooDigitSumProvider()
    {
        return [
            'sum of all digits is multiple of 8 (1 digit)' => [8, 'Inf; InfInf'],
            'sum of all digits is multiple of 8 (2 digits)' => [17, 'QixInf'],
            'sum of all digits is multiple of 8 (3 digits)' => [376, 'Inf; Foo; QixInf'],
            'sum of all digits is multiple of 8 (4 digits)' => [3768, 'Inf; Foo; Foo; Qix; InfInf'],
        ];
    }

    public function taskDigitSumProvider()
    {
        return [
            '1 digit' => [4, 4],
            '2 digits' => [43, 7],
            '3 digits' => [435, 12],
            '4 digits' => [4359, 21],
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
