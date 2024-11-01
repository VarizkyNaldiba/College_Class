package soalbonusuts;

public class WalkingZombie extends Zombie implements Destroyable {

    public WalkingZombie(int health, int level) {
        super(health, level);
    }

    public void heal() {
        switch (level) {
            case 1:
                health += health * 0.2; // tambah 20%
                break;
            case 2:
                health += health * 0.3; // tambah 30%
                break;
            case 3:
                health += health * 0.4; // tambah 40%
                break;
        }
    }

    public void destroyed() {
        health -= health * 0.2; // kurangi 20%
    }
}
