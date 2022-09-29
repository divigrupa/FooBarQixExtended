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
        String expectedNumberString = "Foo" + "Bar";

        String resultNumberString = ascription.ascribeFooBarToTheNumber(theNumber);
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
