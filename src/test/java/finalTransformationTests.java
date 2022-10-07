import org.junit.Test;

import static org.junit.Assert.assertEquals;

public class finalTransformationTests {

    //    The following tests assess the final transformation of a given number,
    //    of whether it returns (1) the basic chained words,
    //                          (2) the word chain with the appendages added, and
    //                          (3) the given number as a string, if not transformation has been done.

    FooBarQixService fooBarQixService = new FooBarQixService();
    InfQixFooService infQixFooService = new InfQixFooService();

    @Test
    public void shouldAscribeFooQixCorrectlyTest() throws Exception {

        int theNumber = 21;
        String expectedNumberString = "FooQix";

        String resultNumberString = fooBarQixService.finalTransformationOfTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeInfCorrectlyTest() {

        int theNumber = 64;
        String expectedNumberString = "Inf";

        String resultNumberString = infQixFooService.finalTransformationOfTheNumber(theNumber);  // Create an interface for the method, so that it does not repeat in both classes.
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
    public void shouldAscribeInfFooFooInfCorrectlyTest() {

        int theNumber = 13_824;
        String expectedNumberString = "Inf; FooFooInf";

        String resultNumberString = infQixFooService.finalTransformationOfTheNumber(theNumber);   // Create an interface for the method, so that it does not repeat in both classes.
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooBarQixNumberStringCorrectlyTest() throws Exception {

        int theNumber = 8;
        String expectedNumberString = "8";

        String resultNumberString = fooBarQixService.finalTransformationOfTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeInfQixFooNumberStringCorrectlyTest() {

        int theNumber = 5;
        String expectedNumberString = "5";

        String resultNumberString = infQixFooService.finalTransformationOfTheNumber(theNumber);  // Create an interface for the method, so that it does not repeat in both classes.
        assertEquals(expectedNumberString, resultNumberString);
    }
}