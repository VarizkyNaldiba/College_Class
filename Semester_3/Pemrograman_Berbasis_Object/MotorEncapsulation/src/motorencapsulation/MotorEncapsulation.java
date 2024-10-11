/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package motorencapsulation;

/**
 *
 * @author HP
 */
public class MotorEncapsulation {

    /**
     * @param args the command line arguments
     */

    public static void main(String[] args) {
        // TODO code application logic here
        Motor mtr = new Motor();
        mtr.printStatus();
        mtr.tambahKecepatan();
        
        mtr.nyalakanMesin();
        mtr.printStatus();
        
        mtr.tambahKecepatan();
        mtr.printStatus();
        
        mtr.tambahKecepatan();
        mtr.printStatus();
        
        mtr.tambahKecepatan();
        mtr.printStatus();
        
        mtr.matikanMesin();
        mtr.printStatus();
    }
}
