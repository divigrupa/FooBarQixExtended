public class Ascription {
    public int theNumber;
    public String numberString;


    public String ascribeFooToTheNumber(int theNumber) {

        if (theNumber % 3 == 0 && theNumber % 5 != 0) {
            numberString = "Foo";
        } else {
            ascribeBarToTheNumber(theNumber);
        }

        return numberString;
    }

    public String ascribeBarToTheNumber(int theNumber) {

        if (theNumber % 5 == 0 && theNumber % 3 != 0) {
            numberString = "Bar";
        } else {
            ascribeFooBarToTheNumber(theNumber);
        }

        return numberString;
    }

    public String ascribeFooBarToTheNumber(int theNumber) {
        if (theNumber % 3 == 0 && theNumber % 5 == 0) {
            numberString = "Foo" + "Bar";
        }
        else {
            numberString = String.valueOf(theNumber);
        }

        return numberString;
    }
}

