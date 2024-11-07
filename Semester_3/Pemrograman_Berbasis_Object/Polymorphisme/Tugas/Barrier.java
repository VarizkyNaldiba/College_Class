package Tugas;
public class Barrier implements Destroyable {
private int strength;
public Barrier(int strength) {
this.strength = strength;
}
public void setStrength(int strength) {
this.strength = strength;
}
public int getStrength() {
return this.strength;
}
@Override
public void destroyed() {
this.strength -= (this.strength * 0.1);
}
public String getBarrierInfo() {
return "\nBarrier Strength = " + this.strength;
}
}