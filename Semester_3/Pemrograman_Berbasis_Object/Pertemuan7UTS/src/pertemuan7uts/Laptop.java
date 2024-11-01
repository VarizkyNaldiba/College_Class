package pertemuan7uts;

public class Laptop extends Komputer {
    public String jnsBatrai;

    public Laptop(String jnsBatrai, String merk, String jnsProsesor, int kecProc, int sizeMem) {
        super(merk, jnsProsesor, kecProc, sizeMem); 
        this.jnsBatrai = jnsBatrai; 
    }

    public void tampilLaptop() {
        tampilData();  
        System.out.println("Jenis Baterai: " + jnsBatrai);
    }
}
