/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package week7;

/**
 *
 * @author HP
 */
public class Child extends Parent {
    public int x = 5;
    
    
    public void info(int x) {
            System.out.println("Nilai x sbg parameter = " + x);
            System.out.println("Nilai x di mhs =" + this.x);
            System.out.println("Nilai x di week7 =" + super.x);
        }
}
