/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package pbo_prt5;

/**
 *
 * @author HP
 */
public class PBO_prt5 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // Membuat objek siswa
        siswa a = new siswa();

        // Membuat objek rapor dengan parameter yang benar
        rapor r = new rapor("123456", "Anjay", 90);

        // Memanggil method naikKelas dan menyimpan hasilnya
        boolean eh = a.naikKelas(new rapor("123", "var", 90), 1);

        // Menampilkan status kenaikan kelas
        System.out.println("Status kenaikan kelas adalah " + eh);
        
        a.getRapor("123", 0, r)
    }
    
}

