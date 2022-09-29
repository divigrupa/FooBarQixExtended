import org.junit.Assert;
import org.junit.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class FooBarQixTest {

    Ascription ascription = new Ascription();

    @Test
    public void shouldAscribeFooCorrectlyTest() throws Exception {

        int theNumber = 18;
        String expectedName = "Foo";
        String expectedNumber = String.valueOf(theNumber);

        String resultName = ascription.ascribeFooToTheNumber(theNumber);
        String resultNumber = ascription.tranformTheNumber(theNumber);

        assertEquals(expectedName, resultName);
        assertEquals(expectedNumber, resultNumber);
    }


    @Test
    public void shouldAscribeBarCorrectlyTest() throws Exception {

        int theNumber = 20;
        String expectedName = "Bar";
        String expectedNumber = String.valueOf(theNumber);

        String resultName = ascription.ascribeBarToTheNumber(theNumber);
        String resultNumber = ascription.tranformTheNumber(theNumber);

        assertEquals(expectedName, resultName);
        assertEquals(expectedNumber, resultNumber);
    }


    @Test
    public void shouldAscribeFooBarCorrectlyTest() throws Exception {

        int theNumber = 15;
        String expectedName = "Foo" + "Bar";
        String expectedNumber = String.valueOf(theNumber);

        String resultName = ascription.ascribeFooBarToTheNumber(theNumber);
        String resultNumber = ascription.tranformTheNumber(theNumber);

        assertEquals(expectedName, resultName);
        assertEquals(expectedNumber, resultNumber);
    }
}
