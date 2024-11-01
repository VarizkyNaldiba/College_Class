package soalbonusuts;

public class Plant {
    public void doDestroy(Destroyable destroyable) {
        destroyable.destroyed();
        if (destroyable instanceof Zombie) {
            Zombie zombie = (Zombie) destroyable;
            if (zombie.getHealth() <= 0) {
                System.out.println("Zombie kalah!");
            }
        } else if (destroyable instanceof Barrier) {
            Barrier barrier = (Barrier) destroyable;
            if (barrier.getStrength() <= 0) {
                System.out.println("Barrier Hancur!");
            }
        }
    }
}
