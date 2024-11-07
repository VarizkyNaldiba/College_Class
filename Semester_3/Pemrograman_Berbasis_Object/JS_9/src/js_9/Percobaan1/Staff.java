/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package js_9.Percobaan1;

/**
 *
 * @author HP
 */
public class Staff extends Karyawan {
                private int lembur;
                private double gajiLembur;

    public int getLembur() {
        return lembur;
    }

    public void setLembur(int lembur) {
        this.lembur = lembur;
    }

    public double getGajiLembur() {
        return gajiLembur;
    }

    public void setGajiLembur(double gajiLembur) {
        this.gajiLembur = gajiLembur;
    }
                
     public double getGaji() {
         return super.getGaji()+lembur*gajiLembur;
     }
     public double getGaji(int lembur, double gajiLembur){
         
         return super.getGaji()+lembur*gajiLembur;
     }
     
     public void lihatInfo() {
         System.out.println("NIP    :" + this.getNip());
         System.out.println("Nama ");
     }
}
