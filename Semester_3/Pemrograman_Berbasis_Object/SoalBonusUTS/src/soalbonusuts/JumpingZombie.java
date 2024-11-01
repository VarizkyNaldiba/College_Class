package soalbonusuts;

public class JumpingZombie extends Zombie implements Destroyable {

    public JumpingZombie(int health, int level) {
        super(health, level);
    }

    
    public void heal() {
        switch (level) {
            case 1:
                health += health * 0.3; // tambah 30%
                break;
            case 2:
                health += health * 0.4; // tambah 40%
                break;
            case 3:
                health += health * 0.5; // tambah 50%
                break;
        }
    }

    public void destroyed() {
        health -= health * 0.1; // kurangi 10%
    }
}
