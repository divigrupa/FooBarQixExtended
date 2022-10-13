import org.junit.Test;

import static org.junit.Assert.assertEquals;

public class FooBarQix_AppendagesTests {

    //    The following tests assess the functionality of the fooBarQixService.creatingAppendagesToTheNumberString() method.
    //    It ascribes words Foo, Bar, Qix depending on whether the given number includes numbers 3, 5, or 7 and
    //       appends it to the already existing numberString from the fooBarQixService.basicFooBarQixService() method.

    //    The tests assess (1) whether the appendages are created correctly,
    //                     (2) whether they are correctly added to the numberString from the basicFooBarQixService() method.

    FooBarQixService fooBarQixService = new FooBarQixService();

    @Test
    public void shouldCreateAppendagesCorrectlyTest() throws Exception {

        int theNumber = 15796;
        String expectedNumberString = "BarQix";

        String resultNumberString = fooBarQixService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldCreateAppendagesCorrectlyTest1() throws Exception {

        int theNumber = 35;
        String expectedNumberString = "FooBar";

        String resultNumberString = fooBarQixService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAppendFooBarQixCorrectlyTest1() throws NumberPositiveIntegerException {

        int theNumber = 35;
        String expectedNumberString = "BarQixFooBar";

        fooBarQixService.basicService(theNumber);
        String resultNumberString = fooBarQixService.finalTransformation(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }
}