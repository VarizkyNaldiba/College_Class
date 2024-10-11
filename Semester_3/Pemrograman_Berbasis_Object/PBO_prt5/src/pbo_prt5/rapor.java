package pbo_prt5;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author HP
 */
public class rapor {
    String nama, nim;
    int nilai;
 
    public rapor (String n, String m, int v) {
        this.nim = n;
        this.nama = m;
        this.nilai = v ;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getNim() {
        return nim;
    }

    public void setNim(String nim) {
        this.nim = nim;
    }

    public int getNilai() {
        return nilai;
    }

    public void setNilai(int nilai) {
        this.nilai = nilai;
    }
    
    public void cetak () {
        System.out.println("Nama" + nama);
        System.out.println("Nim" + nim);
        System.out.println("Nilai" + nilai);
    }
    
    
}
