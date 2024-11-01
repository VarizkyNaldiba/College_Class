package pertemuan7uts;

public class Pc extends Komputer {
    public int ukuranMonit;

    public Pc(int ukuranMonit, String merk, String jnsProsesor, int kecProc, int sizeMem) {
        super(merk, jnsProsesor, kecProc, sizeMem); 
        this.ukuranMonit = ukuranMonit; 
    }
    
    public void tampilPc() {
        tampilData(); 
        System.out.println("Ukuran Monitor: " + ukuranMonit + " inch");
    }
}
