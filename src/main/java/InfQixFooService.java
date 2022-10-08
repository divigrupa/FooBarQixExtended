public class InfQixFooService extends Service {

    String numberString = "";
    int[] multipliers = {8, 7, 3};
    String[] numberNames = {"Inf", "Qix", "Foo"};

    @Override
    public String basicService(int theNumber) throws NumberPositiveIntegerException {
        if (theNumber < 0) throw new NumberPositiveIntegerException();

        for (int i = 0; i < multipliers.length; i++) {
            if (theNumber % multipliers[i] == 0) {
                if (!numberString.isEmpty()) numberString += "; ";
                numberString += numberNames[i];
            }
        }
        return numberString;
    }

    public String finalTransformation(int theNumber) throws NumberPositiveIntegerException {
        return finalTransformationOfTheNumber(theNumber, multipliers, numberNames, numberString);
    }
}