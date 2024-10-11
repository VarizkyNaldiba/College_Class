package pertemuan2;



/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */


/**
 *
 * @author HP
 */
public class Pertemuan2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Dosen luqman = new Dosen();
        luqman.profile(" 1234 ", " Luqman Ngganteng ");
        luqman.nidk =" 11234 ";
        luqman.nama = " Luqmannn ";
//        System.out.println("Nama = " + luqman.nama);
//        
        luqman.cetak();
//        Dosen indra = new Dosen();
//        indra.profile("2210", "annjay");
//        
        System.out.println(luqman.nama + luqman.nidk);
//        System.out.println(indra.nama + indra.nidk);
        
        Mahasiswa steven = new Mahasiswa();
        steven.profile(" Steven "," 1234 ");
//        steven.cetak();
        luqman.nilai(85);
        
        steven.cetakNilai(luqman.nilaiHuruf(85));
         
        System.out.println("Nilai " + steven.nama + " adalah " + steven.cetakNilai(luqman.nilaiHuruf(85)));
        
          
        
//        System.out.println(nilai);
        
        

    }
    
}
