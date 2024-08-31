/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/File.java to edit this template
 */

/**
 *
 * @author HP
 */
public class Sepeda {
    private String merek;
    private int kecepatan;
    private int gear;
    
    public void setMerek (String newValue) {
        merek = newValue;
    }
    
    public void gantiGear (int newValue) {
        gear = newValue;
    }
    
    public void tambahKecepatan (int decrement){
        kecepatan = kecepatan - decrement;
    }
   
    void cetakStatus() {
        System.out.println("Merek: " + merek);
        System.out.println("Kecepatan: " + kecepatan );
        System.out.println("Gear: " + gear);
}
    public static void main(String args[]) {
        // TODO code application logic here
    }
}
