import org.junit.Test;

import static org.junit.jupiter.api.Assertions.*;

public class FooBarQixTest {

    Ascription ascription = new Ascription();

    @Test
    public void shouldAscribeFooCorrectlyTest() {

        int theNumber = 18;
        String expectedNumberString = "Foo";
        String expectedAppendagesString = "";
        String expectedMergedNumberString = "Foo";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        String resultAppendagesString = ascription.appendagesOfTheNumberString(theNumber);
        String resultMergedNumberString = resultNumberString + resultAppendagesString;

        assertEquals(expectedNumberString, resultNumberString);
        assertEquals(expectedAppendagesString, resultAppendagesString);
        assertEquals(expectedMergedNumberString, resultMergedNumberString);
    }

    @Test
    public void shouldAscribeBarCorrectlyTest() {

        int theNumber = 20;
        String expectedNumberString = "Bar";
        String expectedAppendagesString = "";
        String expectedMergedNumberString = "Bar";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        String resultAppendagesString = ascription.appendagesOfTheNumberString(theNumber);
        String resultMergedNumberString = resultNumberString + resultAppendagesString;

        assertEquals(expectedNumberString, resultNumberString);
        assertEquals(expectedAppendagesString, resultAppendagesString);
        assertEquals(expectedMergedNumberString, resultMergedNumberString);
    }

    @Test
    public void shouldAscribeFooBarCorrectlyTest() {

        int theNumber = 15;
        String expectedNumberString = "FooBar";
        String expectedAppendagesString = "Bar";
        String expectedMergedNumberString = "FooBarBar";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        String resultAppendagesString = ascription.appendagesOfTheNumberString(theNumber);
        String resultMergedNumberString = resultNumberString + resultAppendagesString;

        assertEquals(expectedNumberString, resultNumberString);
        assertEquals(expectedAppendagesString, resultAppendagesString);
        assertEquals(expectedMergedNumberString, resultMergedNumberString);
    }

    @Test
    public void shouldAscribeQixCorrectlyTest() {

        int theNumber = 49;
        String expectedNumberString = "Qix";
        String expectedAppendagesString = "";
        String expectedMergedNumberString = "Qix";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        String resultAppendagesString = ascription.appendagesOfTheNumberString(theNumber);
        String resultMergedNumberString = resultNumberString + resultAppendagesString;

        assertEquals(expectedNumberString, resultNumberString);
        assertEquals(expectedAppendagesString, resultAppendagesString);
        assertEquals(expectedMergedNumberString, resultMergedNumberString);
    }

    @Test
    public void shouldAscribeFooBarQixCorrectlyTest() {

        int theNumber = 10290;
        String expectedNumberString = "FooBarQix";
        String expectedAppendagesString = "";
        String expectedMergedNumberString = "FooBarQix";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        String resultAppendagesString = ascription.appendagesOfTheNumberString(theNumber);
        String resultMergedNumberString = resultNumberString + resultAppendagesString;

        assertEquals(expectedNumberString, resultNumberString);
        assertEquals(expectedAppendagesString, resultAppendagesString);
        assertEquals(expectedMergedNumberString, resultMergedNumberString);
    }

    @Test
    public void shouldAscribeFooQixCorrectlyTest() {

        int theNumber = 21;
        String expectedNumberString = "FooQix";
        String expectedAppendagesString = "";
        String expectedMergedNumberString = "FooQix";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        String resultAppendagesString = ascription.appendagesOfTheNumberString(theNumber);
        String resultMergedNumberString = resultNumberString + resultAppendagesString;

        assertEquals(expectedNumberString, resultNumberString);
        assertEquals(expectedAppendagesString, resultAppendagesString);
        assertEquals(expectedMergedNumberString, resultMergedNumberString);
    }

    @Test
    public void shouldAscribeBarQixCorrectlyTest() {

        int theNumber = 35;
        String expectedNumberString = "BarQix";
        String expectedAppendagesString = "FooBar";
        String expectedMergedNumberString = "BarQixFooBar";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        String resultAppendagesString = ascription.appendagesOfTheNumberString(theNumber);
        String resultMergedNumberString = resultNumberString + resultAppendagesString;

        assertEquals(expectedNumberString, resultNumberString);
        assertEquals(expectedAppendagesString, resultAppendagesString);
        assertEquals(expectedMergedNumberString, resultMergedNumberString);
    }


    @Test
    public void shouldReturnOtherNumbersAsStringTest() {

        int theNumber = 8;
        String expectedMergedNumberString = "8";

        String resultNumberString = ascription.convertNumberToString(theNumber);
        String resultAppendagesString = ascription.appendagesOfTheNumberString(theNumber);
        String resultMergedNumberString = resultNumberString + resultAppendagesString;

        assertEquals(expectedMergedNumberString.getClass().getName(), resultMergedNumberString.getClass().getName());
    }

}
