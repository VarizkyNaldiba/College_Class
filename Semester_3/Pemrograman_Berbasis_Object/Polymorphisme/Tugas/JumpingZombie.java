package Tugas;
public class JumpingZombie extends Zombie {
public JumpingZombie(int health, int level) {
this.health = health;
this.level = level;
}
@Override
public void heal() {
switch(this.level) {
case 1:
this.health += (this.health * 0.3);
break;
case 2:
this.health += (this.health * 0.4);
break;
case 3:
this.health += (this.health * 0.5);
break;
}
}
@Override
public void destroyed() {
this.health -= (this.health * 0.01);
}
@Override
public String getZombieInfo() {
return "Jumping Zombie Data = " + super.getZombieInfo();
}
}