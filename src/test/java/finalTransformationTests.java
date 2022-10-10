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

    @Test
    public void shouldDoTheFinalTransformationOfTheNumberTest() throws Exception {
        int theNumber = 5;
        int[] multipliers = {3, 5, 7};
        String[] numberNames = {"Foo", "Bar", "Qix"};
        String numberString = "Foo";
        String expectedNumberString = "FooBar";

        String resultNumberString = Service.finalTransformationOfTheNumber(theNumber, multipliers, numberNames, numberString);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldDoTheFinalTransformationOfTheNumberTest1() throws Exception {
        int theNumber = 268;
        int[] multipliers = {3, 5, 7};
        String[] numberNames = {"Foo", "Bar", "Qix"};
        String numberString = "268";
        String expectedNumberString = "268";

        String resultNumberString = Service.finalTransformationOfTheNumber(theNumber, multipliers, numberNames, numberString);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldDoTheFinalTransformationOfTheNumberTest2() throws Exception {
        int theNumber = 13_824;
        int[] multipliers = {3, 5, 7};
        String[] numberNames = {"Foo", "Bar", "Qix"};
        String numberString = "Foo";
        String expectedNumberString = "FooFoo";

        String resultNumberString = Service.finalTransformationOfTheNumber(theNumber, multipliers, numberNames, numberString);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldDoTheFinalTransformationOfTheNumberTest3() throws Exception {
        int theNumber = 5;
        int[] multipliers = {8, 7, 3};
        String[] numberNames = {"Inf", "Qix", "Foo"};
        String numberString = "5";
        String expectedNumberString = "5";

        String resultNumberString = Service.finalTransformationOfTheNumber(theNumber, multipliers, numberNames, numberString);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldDoTheFinalTransformationOfTheNumberTest4() throws Exception {
        int theNumber = 45_436;
        int[] multipliers = {8, 7, 3};
        String[] numberNames = {"Inf", "Qix", "Foo"};
        String numberString = "";
        String expectedNumberString = "Foo";

        String resultNumberString = Service.finalTransformationOfTheNumber(theNumber, multipliers, numberNames, numberString);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldDoTheFinalTransformationOfTheNumberTest5() throws Exception {
        int theNumber = 5_472;
        int[] multipliers = {8, 7, 3};
        String[] numberNames = {"Inf", "Qix", "Foo"};
        String numberString = "Inf; Foo";
        String expectedNumberString = "Inf; FooQix";

        String resultNumberString = Service.finalTransformationOfTheNumber(theNumber, multipliers, numberNames, numberString);
        assertEquals(expectedNumberString, resultNumberString);
    }

    @Test
    public void shouldDoTheFinalTransformationOfTheNumberTest6() throws Exception {
        int theNumber = 5_472;
        int[] multipliers = {8, 7, 3};
        String[] numberNames = {"Inf", "Qix", "Foo"};
        String numberString = infQixFooService.basicService(theNumber);
        String expectedNumberString = "Inf; FooQix";

        String resultNumberString = Service.finalTransformationOfTheNumber(theNumber, multipliers, numberNames, numberString);
        assertEquals(expectedNumberString, resultNumberString);
    }
}