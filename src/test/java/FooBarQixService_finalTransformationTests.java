import org.junit.Test;

import static org.junit.Assert.assertEquals;

public class FooBarQixService_finalTransformationTests {

    //    The following tests assess the final transformation of a given number,
    //    of whether it returns (1) the basic chained words,
    //                          (2) the word chain with the appendages added, and
    //                          (3) the given number as a string, if not transformation has been done.

    FooBarQixService fooBarQixService = new FooBarQixService();

    @Test
    public void shouldAscribeFooQixCorrectlyTest() throws Exception {

        int theNumber = 21;
        String expectedNumberString = "FooQix";

        String resultNumberString = fooBarQixService.finalTransformationOfTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeBarQixFooBarCorrectlyTest() throws Exception {

        int theNumber = 35;
        String expectedNumberString = "BarQixFooBar";

        String resultNumberString = fooBarQixService.finalTransformationOfTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeNumberStringCorrectlyTest() throws Exception {

        int theNumber = 8;
        String expectedNumberString = "8";

        String resultNumberString = fooBarQixService.finalTransformationOfTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }
}