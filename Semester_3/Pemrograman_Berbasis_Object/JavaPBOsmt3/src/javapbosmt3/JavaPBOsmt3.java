/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package javapbosmt3;

/**
 *
 * @author HP
 */
public class JavaPBOsmt3 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
    Mahasiswa mhs = new Mahasiswa("waduh", "1223");
    
//      Mengubah nama dan ninm
        mhs.setNama("Rafi");
        mhs.setNim("1435");
        
//      Memanggil nama dan nim
        System.out.println(mhs.getNama());
        System.out.println(mhs.getNim());
        
        // TODO code application logic here
    }
    
}
