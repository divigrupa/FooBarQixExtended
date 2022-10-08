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
    public void shouldAscribeFooQixCorrectlyTest() throws NumberPositiveIntegerException {

        int theNumber = 21;
        String expectedNumberString = "FooQix";

        fooBarQixService.basicService(theNumber);
        String resultNumberString = fooBarQixService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeInfCorrectlyTest() throws Exception {

        int theNumber = 64;
        String expectedNumberString = "Inf";

        infQixFooService.basicService(theNumber);
        String resultNumberString = infQixFooService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeBarQixFooBarCorrectlyTest() throws NumberPositiveIntegerException {

        int theNumber = 35;
        String expectedNumberString = "BarQixFooBar";

        fooBarQixService.basicService(theNumber);
        String resultNumberString = fooBarQixService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeInfFooFooInfCorrectlyTest() throws Exception {

        int theNumber = 13_824;
        String expectedNumberString = "Inf; FooFooInf";

        infQixFooService.basicService(theNumber);
        String resultNumberString = infQixFooService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooBarQixNumberStringCorrectlyTest() throws NumberPositiveIntegerException {

        int theNumber = 8;
        String expectedNumberString = "8";

        fooBarQixService.basicService(theNumber);
        String resultNumberString = fooBarQixService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeInfQixFooNumberStringCorrectlyTest() throws Exception {

        int theNumber = 5;
        String expectedNumberString = "5";

        infQixFooService.basicService(theNumber);
        String resultNumberString = infQixFooService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }
}