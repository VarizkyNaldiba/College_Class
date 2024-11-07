package Tugas;

public class MainClass {
    public static void main(String[] args) {
        
        Manusia manusia1 = new Dosen();
        Manusia manusia2 = new Mahasiswa(); 

        manusia1.makan(); 
        manusia2.makan(); 

        manusia1.bernafas();
        manusia2.bernafas();
    }
}
