package Tugas;
public class Tester {
public static void main(String[] args) {
WalkingZombie wz = new WalkingZombie(100, 1);
JumpingZombie jz = new JumpingZombie(100, 2);
Barrier b = new Barrier(100);
Plant p = new Plant();
System.out.println("" + wz.getZombieInfo());
System.out.println("" + jz.getZombieInfo());
System.out.println("" + b.getBarrierInfo());
System.out.println("\nPlant vs Zombie Battle Begin!");
System.out.println("\nRound 1");
p.doDestroy(wz);
p.doDestroy(jz);
p.doDestroy(b);
System.out.println("\nRound 2");
wz.heal();
jz.heal();
p.doDestroy(wz);
p.doDestroy(jz);
p.doDestroy(b);
}
}