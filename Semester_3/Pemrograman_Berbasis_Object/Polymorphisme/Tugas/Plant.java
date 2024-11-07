package Tugas;
public class Plant {
public void doDestroy(Destroyable d) {
if (d instanceof Zombie) {
Zombie z = (Zombie) d;
z.destroyed();
System.out.println(z.getZombieInfo());
} else if (d instanceof Barrier) {
Barrier b = (Barrier) d;
b.destroyed();
System.out.println(b.getBarrierInfo());
}
}
}