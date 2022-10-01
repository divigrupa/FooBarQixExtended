import org.junit.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class FooBarQixTest {

    Ascription ascription = new Ascription();

    @Test
    public void shouldAscribeFooCorrectlyTest() {

        int theNumber = 18;
        String expectedNumberString = "Foo";

        String resultNumberString = ascription.ascribeFooToTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeBarCorrectlyTest() {

        int theNumber = 20;
        String expectedNumberString = "Bar";

        String resultNumberString = ascription.ascribeBarToTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }


    @Test
    public void shouldAscribeFooBarCorrectlyTest() {

        int theNumber = 15;
        String expectedNumberString = "FooBar";  // Fixed to make it more concrete.
//        Fix the method
        String resultNumberString = ascription.ascribeFooBarToTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeQixCorrectlyTest() {

        int theNumber = 42;
        String expectedNumberString = "Qix";

        String resultNumberString = ascription.ascribeQixToTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooBarQixCorrectlyTest() {

        int theNumber = 10290;
        String expectedNumberString = "FooBarQix";

        String resultNumberString = ascription.ascribeFooBarQixToTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeFooQixCorrectlyTest() {

        int theNumber = 21;
        String expectedNumberString = "FooQix";

        String resultNumberString = ascription.ascribeFooQixToTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAscribeBarQixCorrectlyTest() {

        int theNumber = 21;
        String expectedNumberString = "BarQix";

        String resultNumberString = ascription.ascribeBarQixToTheNumber(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldReturnOtherNumbersAsStringTest() {

        int theNumber = 8;
        String expectedNumberString = String.valueOf(theNumber);

        String resultNumberString = ascription.ascribeFooBarToTheNumber(theNumber);
        assertEquals(expectedNumberString.getClass().getName(), resultNumberString.getClass().getName());
    }
}
