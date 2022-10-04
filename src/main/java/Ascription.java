public class Ascription<theNumber> {

    public int theNumber;
    public String numberString = "";
    private int[] multipliers = {3, 5, 7};
    private String[] numberNames = {"Foo", "Bar", "Qix"};

    public String convertNumberToString(int theNumber) {
        for (int i = 0; i < multipliers.length; i++) {
            if (theNumber % multipliers[i] == 0) {
                numberString += numberNames[i];
            }
        }

        String convertedNumber = String.valueOf(theNumber);
        for (int i = 0; i < convertedNumber.length(); i++) {
            String theNumberDigit = String.valueOf(convertedNumber.charAt(i));

            for (int j = 0; j < multipliers.length; j++) {
                if (theNumberDigit.equals(String.valueOf(multipliers[j]))) {
                    numberString += numberNames[j];
                }
            }
            if (numberString.isEmpty()) {
                numberString = String.valueOf(theNumber);
            }
        }
        return numberString;
    }
}
