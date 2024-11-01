package soalbonusuts;

public class SoalBonusUTS {
    public static void main(String[] args) {
        WalkingZombie wZombie = new WalkingZombie(100, 1);
        JumpingZombie jZombie = new JumpingZombie(150, 2);
        Barrier barrier = new Barrier(20);
        Plant plant = new Plant();

        System.out.println("Before Healing:");
        System.out.println(wZombie.getZombieInfo());
        System.out.println(jZombie.getZombieInfo());
        System.out.println(barrier.getBarrierInfo());

        wZombie.heal();
        jZombie.heal();
        System.out.println("After Healing:");
        System.out.println(wZombie.getZombieInfo());
        System.out.println(jZombie.getZombieInfo());

        
        plant.doDestroy(wZombie);
        plant.doDestroy(barrier);
        System.out.println("After Destruction:");
        System.out.println(wZombie.getZombieInfo());
        System.out.println(barrier.getBarrierInfo());

        
        plant.doDestroy(wZombie);
        plant.doDestroy(barrier);
        plant.doDestroy(barrier); 
    }
}
