public abstract class Service {

    public abstract String basicService(int theNumber) throws NumberPositiveIntegerException;

    public String finalTransformationOfTheNumber(int theNumber, int[] multipliers, String[] numberNames, String numberString) throws NumberPositiveIntegerException {

        if (theNumber < 0) throw new NumberPositiveIntegerException();

        String convertedNumber = String.valueOf(theNumber);
        String appendagesString = "";
        String finalNumberString = "";

        for (int i = 0; i < convertedNumber.length(); i++) {
            String theNumberDigit = String.valueOf(convertedNumber.charAt(i));
            for (int j = 0; j < multipliers.length; j++) {
                if (theNumberDigit.equals(String.valueOf(multipliers[j]))) {
                    appendagesString += numberNames[j];
                }
            }
        }

        if (appendagesString.isEmpty() && numberString.isEmpty()) {
            finalNumberString = convertedNumber;
        } else if (appendagesString.isEmpty()) {
            finalNumberString = numberString;
        } else {
            finalNumberString = numberString + appendagesString;
        }
        return finalNumberString;
    }
}
