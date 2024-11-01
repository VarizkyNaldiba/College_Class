package Case2_OverRding;

public class main {
    public static void main(String[] args) {
        
        Manejer Josh = new Manejer("Josh", 10000000);
        Supervisor Jack = new Supervisor("Jack", 5000000);
        
        Josh.naikkanGaji();
        Jack.naikkanGaji();
        
        Josh.cetakStatus();
        Jack.cetakStatus();
    }
    
}
