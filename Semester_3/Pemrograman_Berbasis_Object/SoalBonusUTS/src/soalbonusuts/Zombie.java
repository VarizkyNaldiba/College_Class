package soalbonusuts;

public class Zombie {
    protected int health;
    protected int level;

    public Zombie(int health, int level) {
        this.health = health;
        this.level = level;
    }

    public void heal() {
     
    }

    public void destroyed() {
      
    }

    public String getZombieInfo() {
        return "Health: " + health + ", Level: " + level;
    }

    public int getHealth() {
        return health;
    }
}
