import org.junit.Test;

import static org.junit.Assert.assertEquals;

public class FooBarQixService_BasicFunctionalityTests {

    FooBarQixService fooBarQixService = new FooBarQixService();

//    The following are various tests assessing the fooBarQixService.basicService() method.
//    It ascribes words Foo, Bar, Qix depending on whether the given number is a multiple of 3, 5, or 7.
//    For several multiples,the words are chained together in natural order.

    @Test
    public void shouldAscribeFooCorrectlyTest() throws NumberPositiveIntegerException {

        int theNumber = 18;
        String expectedNumberString = "Foo";

        String resultNumberString = fooBarQixService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeBarCorrectlyTest() throws Exception {

        int theNumber = 20;
        String expectedNumberString = "Bar";

        String resultNumberString = fooBarQixService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooBarCorrectlyTest() throws Exception {

        int theNumber = 15;
        String expectedNumberString = "FooBar";

        String resultNumberString = fooBarQixService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeQixCorrectlyTest() throws Exception {

        int theNumber = 49;
        String expectedNumberString = "Qix";

        String resultNumberString = fooBarQixService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooBarQixCorrectlyTest() throws Exception {

        int theNumber = 10290;
        String expectedNumberString = "FooBarQix";

        String resultNumberString = fooBarQixService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooQixCorrectlyTest() throws Exception {

        int theNumber = 21;
        String expectedNumberString = "FooQix";

        String resultNumberString = fooBarQixService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeQixCorrectlyTest1() throws Exception {

        int theNumber = 35;
        String expectedNumberString = "BarQix";

        String resultNumberString = fooBarQixService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }
}