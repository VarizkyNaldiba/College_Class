package pertemuan2;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author HP
 */
public class Dosen {
    String nidk, nama ;
        
    public void profile(String n, String nm){
        nidk = n;
        nama = nm;
    }
    
    public int nilai(int n) {
        return n;
    }
    
    public void cetak() {
        System.out.println("Nama = " + nama + " NIDK = " + nidk);
    }
    
    public String nilaiHuruf(int n) {
        if (n >= 80) {
            return "A";
        } else if(n>= 60) {
            return "B";
        } else if(n>= 40) {
            return "C";  
        } else if (n>=20) {
            return "D";
        } else {
            return "E";
        }

    }
}
