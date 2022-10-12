public class NumberPositiveIntegerException extends Exception {
    public NumberPositiveIntegerException() {
        super("The given number has to be a positive integer.");
    }

    public static void validateTheNumber(int theNumber) throws NumberPositiveIntegerException {
        if (theNumber <= 0) {
            throw new NumberPositiveIntegerException();
        }
    }
}