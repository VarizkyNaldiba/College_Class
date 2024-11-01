package pertemuan5.uts;

import java.util.ArrayList;

public class Dosen {
    private String nama, nidn;
    private ArrayList<Kelas> daftarKelas;  
    public Dosen(String nama, String nidn) {
        this.nama = nama;
        this.nidn = nidn;
        this.daftarKelas = new ArrayList<>();
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getNidn() {
        return nidn;
    }

    public void setNidn(String nidn) {
        this.nidn = nidn;
    }

    public void tambahKelas(Kelas kelas) {
        daftarKelas.add(kelas);
    }

    public void infoD() {
        System.out.printf("Nama Dosen: %s\n", nama);
        System.out.printf("NIDN: %s\n", nidn);
        System.out.println("Mengajar di kelas:");
        for (Kelas kelas : daftarKelas) {
            System.out.println("- " + kelas.getNamaKelas());
        }
    }
}
