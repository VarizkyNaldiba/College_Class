package pertemuan7uts;

public class Komputer {
    public String merk, jnsProsesor;
    public int kecProc;
    public int sizeMem;

    public Komputer(String merk, String jnsProsesor, int kecProc, int sizeMem) {
        this.merk = merk;
        this.jnsProsesor = jnsProsesor;
        this.kecProc = kecProc;
        this.sizeMem = sizeMem;
    }

    public Komputer() {
    }
    
    public void tampilData() {
        System.out.println("Merk: " + merk);
        System.out.println("Jenis Prosesor: " + jnsProsesor);
        System.out.println("Kecepatan Prosesor: " + kecProc + " GHz");
        System.out.println("Ukuran Memori: " + sizeMem + " GB");
    }
}
