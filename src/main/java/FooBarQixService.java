public class FooBarQixService {

    int theNumber;
    String numberString = "";
    int[] multipliers = {3, 5, 7};
    String[] numberNames = {"Foo", "Bar", "Qix"};

    NumberFeaturesEntity numberFeaturesEntity = new NumberFeaturesEntity(theNumber, numberString, multipliers, numberNames);

    public String basicFooBarQixService(int theNumber) throws Exception {
        if (theNumber <= 0) {
            throw new NumberPositiveIntegerException();
        }

        for (int i = 0; i < multipliers.length; i++) {
            if (theNumber % multipliers[i] == 0) {
                numberString += numberNames[i];
            }
        }
        return numberString;
    }

    public String creatingAppendagesToTheNumberString(int theNumber) throws NumberPositiveIntegerException {
        if (theNumber <= 0) {
            throw new NumberPositiveIntegerException();
        }

        String convertedNumber = String.valueOf(theNumber);
        String appendToTheNumberString = "";
        for (int i = 0; i < convertedNumber.length(); i++) {
            String theNumberDigit = String.valueOf(convertedNumber.charAt(i));
            for (int j = 0; j < multipliers.length; j++) {
                if (theNumberDigit.equals(String.valueOf(multipliers[j]))) {
                    appendToTheNumberString += numberNames[j];
                }
            }
        }
        return appendToTheNumberString;
    }

    //  Adds appendages to the numberString as the final transformation.
    public String finalTransformationOfTheNumber(int theNumber) throws Exception {
        String finalNumberString = basicFooBarQixService(theNumber) + creatingAppendagesToTheNumberString(theNumber);

        if (theNumber <= 0) throw new NumberPositiveIntegerException();
        if (finalNumberString.isEmpty()) {
            finalNumberString = String.valueOf(theNumber);
        }
        return finalNumberString;
    }
}