package pertemuan7uts;

public class Windows extends Laptop {
    public String fitur;

    public Windows(String fitur, String jnsBatrai, String merk, String jnsProsesor, int kecProc, int sizeMem) {
        super(jnsBatrai, merk, jnsProsesor, kecProc, sizeMem); 
        this.fitur = fitur; 
    }

    public void tampilWindows() {
        tampilLaptop(); 
        System.out.println("Fitur Windows: " + fitur);
    }
}
