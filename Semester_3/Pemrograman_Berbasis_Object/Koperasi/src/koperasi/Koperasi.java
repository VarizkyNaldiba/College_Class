/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package koperasi;

/**
 *
 * @author HP
 */
public class Koperasi {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
       Anggota agt1 = new Anggota("Var", "Pdg");
       Anggota agt2 = new Anggota("Baa", "Grt");

//       agt1.setNama("Varizky NR ");
//       agt1.setAlamat(" Padang ");
       agt1.setor(100000);
//       System.out.println("Simpanan " + agt1.getNama() + " : Rp " + agt1.getSimpanan());
       agt2.setor(30000);
//       agt1.pinjam(20000);
//       System.out.println("Simpanan " + agt1.getNama() + " : Rp " + agt1.getSimpanan());
       
       agt1.transfer(10000,agt2,agt1);
//       System.out.println(" Setelah di transfer Simpanan" + agt1 + "menjadi" + simpanan );
    
    }
    
}
