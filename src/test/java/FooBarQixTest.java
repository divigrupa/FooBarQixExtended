import org.junit.Test;

import static org.junit.Assert.assertEquals;

public class FooBarQixTest {

    Ascription ascription = new Ascription();

    @Test
    public void shouldAscribeFooCorrectlyTest() {

        int theNumber = 18;
        String expectedNumberString = "Foo";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeBarCorrectlyTest() {

        int theNumber = 20;
        String expectedNumberString = "Bar";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooBarCorrectlyTest() {

        int theNumber = 15;
        String expectedNumberString = "FooBarBar";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeQixCorrectlyTest() {

        int theNumber = 49;
        String expectedNumberString = "Qix";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooBarQixCorrectlyTest() {

        int theNumber = 10290;
        String expectedNumberString = "FooBarQix";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooQixCorrectlyTest() {

        int theNumber = 21;
        String expectedNumberString = "FooQix";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeBarQixFooBarCorrectlyTest() {

        int theNumber = 35;
        String expectedNumberString = "BarQixFooBar";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldReturnOtherNumbersAsStringTest() {

        int theNumber = 8;
        String expectedMergedNumberString = "8";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedMergedNumberString.getClass().getName(), resultNumberString.getClass().getName());
    }
}
