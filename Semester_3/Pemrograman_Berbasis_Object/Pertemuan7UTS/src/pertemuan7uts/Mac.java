package pertemuan7uts;

public class Mac extends Laptop {
    public String security;

    public Mac(String security, String jnsBatrai, String merk, String jnsProsesor, int kecProc, int sizeMem) {
        super(jnsBatrai, merk, jnsProsesor, kecProc, sizeMem); 
        this.security = security; 
    }

    public void tampilMac() {
        tampilLaptop();  
        System.out.println("Fitur Keamanan: " + security);
    }
}
