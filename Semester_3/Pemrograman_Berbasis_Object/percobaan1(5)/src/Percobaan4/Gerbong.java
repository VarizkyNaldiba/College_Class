/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Percobaan4;

/**
 *
 * @author HP
 */
public class Gerbong {
    private String kode;
    private Kursi[] arrayKursi;
    
    public Gerbong(String kode, int jumlah){
        this.kode = kode;
        this.arrayKursi= new Kursi[jumlah];
        this.initKursi();
    }
    
    private void initKursi() {
        for (int i = 0; i < arrayKursi.length; i++){
            this.arrayKursi[i] = new Kursi( String.valueOf(i+1));
        }
    }
    
    public String info() {
        String info = "";
        info += "Kode : " + kode + "\n";
        for (Kursi kursi : arrayKursi) {
            info += kursi.info();
        }
        return info;
    }
   public boolean setPenumpang(Penumpang penumpang, int nomor) {
        if (nomor > 0 && nomor <= arrayKursi.length) {
            Kursi kursi = this.arrayKursi[nomor - 1];
            if (kursi.getPenumpang() == null) {
                kursi.setPenumpang(penumpang);
                return true;
            } else {
                System.out.println("Maaf, kursi nomor " + nomor + " sudah ditempati.");
                return false;
            }
        } else {
            System.out.println("Nomor kursi tidak valid.");
            return false;
        }
    }
}
