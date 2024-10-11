package motorencapsulation;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
/**
 *
 * @author HP
 */
public class Motor {

    int kecepatan = 0;
    private boolean kontakOn = false;

    public void printStatus() {
        if (kontakOn == true) {
            System.out.println("Kontak On");
        } else {
            System.out.println("Kontak Off");
        }
        System.out.println("Kecepatan : " + kecepatan + "  \n ");
    }

    public void nyalakanMesin() {
        kontakOn = true;
    }

    public void matikanMesin() {
        kontakOn = false;
    }

    public void tambahKecepatan() {
        if (kontakOn == true) {
            kecepatan += 5;
        } else {
            System.out.println("Mesin ga nyala bhang");
        }
    }

    public void kurangiKecepatan() {
        if (kontakOn==true) {
            kecepatan -= 5;
        } else  {
            System.out.println("Mesin Ga nyala bhang");
        }
    }

}
