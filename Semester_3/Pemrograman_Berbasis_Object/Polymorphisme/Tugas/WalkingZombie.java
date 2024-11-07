package Tugas;
public class WalkingZombie extends Zombie {
public WalkingZombie(int health, int level) {
this.health = health;
this.level = level;
}
@Override
public void heal() {
switch(this.level) {
case 1:
this.health += (this.health * 0.2);
break;
case 2:
this.health += (this.health * 0.3);
break;
case 3:
this.health += (this.health * 0.4);
break;
}
}
@Override
public void destroyed() {
this.health -= (this.health * 0.02);
}
@Override
public String getZombieInfo() {
return "Walking Zombie Data = " + super.getZombieInfo();
}
}