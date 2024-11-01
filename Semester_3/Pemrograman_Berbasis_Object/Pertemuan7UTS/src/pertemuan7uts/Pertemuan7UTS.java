package pertemuan7uts;

public class Pertemuan7UTS {
    public static void main(String[] args) {
        // TODO code application logic here
        // Instansiasi objek Komputer
        Komputer komputer1 = new Komputer("Dell", "Intel i5", 2, 8);
        System.out.println("Data Komputer:");
        komputer1.tampilData(); 
        System.out.println(); 
      
        // Instansiasi objek Pc
        Pc pc1 = new Pc(24, "Asus", "Intel i7", 3, 16);
        System.out.println("Data PC:");
        pc1.tampilPc();  
        System.out.println(); 
        // Instansiasi objek Mac
        Mac mac1 = new Mac("Touch ID", "Lithium", "Apple", "M1", 3, 8);
        System.out.println("Data Mac:");
        mac1.tampilMac();  
        System.out.println(); 
        // Instansiasi objek Windows
        Windows win1 = new Windows("Cortana", "Lithium-ion", "HP", "AMD Ryzen", 3, 8);
        System.out.println("Data Windows:");
        win1.tampilWindows();  
        System.out.println(); 
    }
    
}
