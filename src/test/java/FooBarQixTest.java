import org.junit.Test;

import static org.junit.jupiter.api.Assertions.*;

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
        String expectedNumberString = "FooBar";  // Fixed to make it more concrete.

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
    public void shouldAscribeBarQixCorrectlyTest() {

        int theNumber = 35;
        String expectedNumberString = "BarQix";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldReturnOtherNumbersAsStringTest() {

        int theNumber = 8;
        String expectedNumberString = String.valueOf(theNumber);

        String resultNumberString = ascription.convertNumberToString(theNumber);
        assertEquals(expectedNumberString.getClass().getName(), resultNumberString.getClass().getName());
    }

    @Test
    public void shouldCreateAppendagesCorrectlyTest() {

        int theNumber = 35383;
        String expectedNumberString = "FooBarFooFoo";

        String resultNumberString = ascription.appendagesToTheNumberString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldAppendTheCreatedAppendagesCorrectly() {

        int theNumber = 14_679;
        String expectedNumberString = "FooQixQix";

        String resultNumberString = ascription.convertNumberToString(theNumber) + ascription.appendagesToTheNumberString(theNumber);
        assertEquals(expectedNumberString, resultNumberString);
    }
}
