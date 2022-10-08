import org.junit.Test;

import static org.junit.Assert.assertEquals;

public class InfQixFooService_BasicFunctionalityTests {

    InfQixFooService infQixFooService = new InfQixFooService();

//    The following are various tests assessing the basicInfQixFooService() method from InfQixFooService.
//    It ascribes words Inf, Qix, Foo depending on whether the given number is a multiple of 8, 7, or 3.
//    For several multiples,the words are chained together in natural order and separated by a semicolon.

    @Test
    public void shouldAscribeInfCorrectlyTest() throws Exception {

        int theNumber = 64;
        String expectedNumberString = "Inf";

        String resultNumberString = infQixFooService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeQixCorrectlyTest() throws Exception {

        int theNumber = 49;
        String expectedNumberString = "Qix";

        String resultNumberString = infQixFooService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooCorrectlyTest() throws Exception {

        int theNumber = 15;
        String expectedNumberString = "Foo";

        String resultNumberString = infQixFooService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeInfQixCorrectlyTest() throws Exception {

        int theNumber = 56;
        String expectedNumberString = "Inf; Qix";

        String resultNumberString = infQixFooService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeQixFooCorrectlyTest() throws Exception {

        int theNumber = 10290;
        String expectedNumberString = "Qix; Foo";

        String resultNumberString = infQixFooService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeInfFooCorrectlyTest() throws Exception {

        int theNumber = 216;
        String expectedNumberString = "Inf; Foo";

        String resultNumberString = infQixFooService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeInfQixFooCorrectlyTest1() throws Exception {

        int theNumber = 2520;
        String expectedNumberString = "Inf; Qix; Foo";

        String resultNumberString = infQixFooService.basicService(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }
}