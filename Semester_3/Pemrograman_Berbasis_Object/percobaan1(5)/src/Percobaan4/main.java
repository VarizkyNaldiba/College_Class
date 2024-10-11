/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Percobaan4;

/**
 *
 * @author HP
 */
public class main {
    public static void main(String[] args) {
        Penumpang p = new Penumpang("12345", "Mr.Krab");
        Gerbong gerbong = new Gerbong("A",10);
        gerbong.setPenumpang(p,1);
        System.out.println(gerbong.info());
        
        
    }
}
