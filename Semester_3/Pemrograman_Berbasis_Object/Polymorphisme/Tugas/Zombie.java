package Tugas;
public abstract class Zombie implements Destroyable {
protected int health;
protected int level;
public abstract void heal();
@Override
public void destroyed() {
// Will be implemented in child classes
}
public String getZombieInfo() {
return "\nHealth = " + health + "\nLevel = " + level;
}
}