public class NumberFeaturesEntity {

    public int theNumber;
    public String numberString;
    public int[] multipliers;
    public String[] numberNames;

    public NumberFeaturesEntity(int theNumber, String numberString, int[] multipliers, String[] numberNames) {
    }

    public NumberFeaturesEntity() {
    }

    public int getTheNumber() {
        return theNumber;
    }

    public void setTheNumber(int theNumber) {
        this.theNumber = theNumber;
    }

    public String getNumberString() {
        return numberString;
    }

    public void setNumberString(String numberString) {
        this.numberString = numberString;
    }

    public int[] getMultipliers() {
        return multipliers;
    }

    public void setMultipliers(int[] multipliers) {
        this.multipliers = multipliers;
    }

    public String[] getNumberNames() {
        return numberNames;
    }

    public void setNumberNames(String[] numberNames) {
        this.numberNames = numberNames;
    }
}
