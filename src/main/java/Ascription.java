public class Ascription {

    public int theNumber;
    public String numberString = "";
    int[] multipliers = {3, 5, 7};
    String[] numberNames = {"Foo", "Bar", "Qix"};


    public String convertNumberToString(int theNumber) {
        for (int i = 0; i < multipliers.length; i++) {
            if (theNumber % multipliers[i] == 0) {
                numberString += numberNames[i];
            }
        }

        if (numberString.isEmpty()) {
            numberString = String.valueOf(theNumber);
        }
        return numberString;
    }
}

