/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Percobaan4;

/**
 *
 * @author HP
 */
public class Kursi {
    private String nomor;
    private Penumpang penumpang;
    
    public Kursi (String nomor){
        this.nomor = nomor;
    }

    public void setPenumpang(Penumpang penumpang) {
        this.penumpang = penumpang;
    }
    
  public String info (){
      String info = "";
      info += "Nomor: " + nomor + "\n";
      if (this.penumpang != null){
      info += "Penumpang : " + penumpang.info()+ "\n";
  }
      return info;
  }

    Object getPenumpang() {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }
  
    
}
