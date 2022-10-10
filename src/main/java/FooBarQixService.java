public class FooBarQixService extends Service {

    String numberString = "";
    int[] multipliers = {3, 5, 7};
    String[] numberNames = {"Foo", "Bar", "Qix"};

    @Override
    public String basicService(int theNumber) throws NumberPositiveIntegerException {
        NumberPositiveIntegerException.validateTheNumber(theNumber);

        for (int i = 0; i < multipliers.length; i++) {
            if (theNumber % multipliers[i] == 0) {
                numberString += numberNames[i];
            }
        }
        return numberString;
    }

    public String finalTransformation(int theNumber) throws NumberPositiveIntegerException {
        return finalTransformationOfTheNumber(theNumber, multipliers, numberNames, numberString);
    }
}