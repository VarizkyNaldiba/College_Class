package pertemuan2;

//
// * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
// * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
// */

/**
 *
 * @author HP
 */
public class Mahasiswa {
    String nama, nim;
    
    public void profile(String nm, String n) {
        nim = n;
        nama = nm;       
    }
    
    public void cetak() {
            System.out.println("Nama" + nama + "NIM" + nim);
    }
    public String cetakNilai(String n) {
        return n;
    }
}
