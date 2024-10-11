/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package koperasi;

/**
 *
 * @author HP
 */
public class Anggota {
    
    private String nama, alamat;
    private float simpanan;


    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    public float getSimpanan() {
        return simpanan;
    }

//    public void setSimpanan(float simpanan) {
//        this.simpanan = simpanan;
//    }
    public void setor(float s) {
        simpanan += s;
    }
    
    public void pinjam(float p) {
        simpanan -= p;
    }
    
    private Anggota(String nm, String alm) {
        this.nama=nm;
        this.alamat=alm;
    }
    
    public void cetakTransaksi() {
        System.out.println("Uang" + nama + "tersisa" + simpanan  );
    }
    
    public void transfer(float nominal, Anggota penerima, Anggota pengirim ) {
        if (nominal > simpanan ) {
            System.out.println("Maaf Tidak bisa Transfer");
        } else {
            simpanan -= nominal;
            
        }
        System.out.println(" Setelah ditransfer Saldo " + pengirim + " tersisa " + simpanan);
    }
   
}
