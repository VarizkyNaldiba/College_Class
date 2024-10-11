/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package percobaan1.pkg5;

/**
 *
 * @author HP
 */
public class Percobaan15 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Processor p1 = new Processor("intel i5", 3);
        p1.setMerk("intel i5");
        p1.setCache(4);
        
        System.out.println("hh");
        Laptop L1 = new Laptop("e", p1);
        L1.setMerk("Thinkpad");
        L1.setProc(p1);
        L1.info();
    }
    
}


