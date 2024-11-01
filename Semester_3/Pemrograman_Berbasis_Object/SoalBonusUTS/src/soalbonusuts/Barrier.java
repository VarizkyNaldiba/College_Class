package soalbonusuts;

public class Barrier implements Destroyable {
    private int strength;

    public Barrier(int strength) {
        this.strength = strength;
    }

    @Override
    public void destroyed() {
        strength -= 9; // mengurangi strength sebesar 9
    }

    public int getStrength() {
        return strength;
    }

    public String getBarrierInfo() {
        return "Strength: " + strength;
    }
}
