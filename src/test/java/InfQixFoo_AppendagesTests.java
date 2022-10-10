import org.junit.Test;

import static org.junit.Assert.assertEquals;

public class InfQixFoo_AppendagesTests {

    //    The following are various tests assessing the creatingAppendages() method from InfQixFooService.
    //    It ascribes words Foo, Inf, Qix depending on whether the given number includes digits 3, 8, or 7 and
    //       appends it to the already existing numberString from the basicInfQixFooService() method from the InfQixFooService.

    //    The tests assess (1) whether the appendages are created correctly,
    //                     (2) whether they are correctly added to the numberString from the basicInfQixFooService() method.

    InfQixFooService infQixFooService = new InfQixFooService();

    @Test
    public void shouldCreateAppendagesCorrectlyTest1() throws Exception {

        int theNumber = 15796;
        String expectedNumberString = "Qix";

        String resultNumberString = infQixFooService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldCreateAppendagesCorrectlyTest2() throws Exception {

        int theNumber = 2887963;
        String expectedNumberString = "InfInfQixFoo";

        String resultNumberString = infQixFooService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAppendInfQixFooCorrectlyTest1() throws Exception {

        int theNumber = 10290;
        String expectedNumberString = "Qix; Foo";

        infQixFooService.basicService(theNumber);
        String resultNumberString = infQixFooService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAppendInfQixFooCorrectlyTest2() throws Exception {

        int theNumber = 1008;
        String expectedNumberString = "Inf; Qix; FooInf";

        infQixFooService.basicService(theNumber);
        String resultNumberString = infQixFooService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAppendInfQixFooCorrectlyTest3() throws Exception {

        int theNumber = 13_824;
        String expectedNumberString = "Inf; FooFooInf";

        infQixFooService.basicService(theNumber);
        String resultNumberString = infQixFooService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAppendInfIfSumOfNumberDigitsDividesBy8Test () throws Exception {
        int theNumber = 343_824;
        String expectedNumberString = "Inf; FooFooFooInfInf";

        String resultNumberString = infQixFooService.appendFinalInf(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }
}