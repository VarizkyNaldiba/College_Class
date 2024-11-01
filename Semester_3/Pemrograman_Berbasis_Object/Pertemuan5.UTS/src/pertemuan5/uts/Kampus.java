package pertemuan5.uts;

import java.util.ArrayList;

public class Kampus {
    private String univ;
    private ArrayList<Dosen> daftarDosen;  // Kampus memiliki banyak dosen
    private ArrayList<Kelas> daftarKelas;  // Kampus memiliki banyak kelas

    public Kampus(String univ) {
        this.univ = univ;
        this.daftarDosen = new ArrayList<>();
        this.daftarKelas = new ArrayList<>();
    }

    public String getUniv() {
        return univ;
    }

    public void setUniv(String univ) {
        this.univ = univ;
    }

    public void tambahDosen(Dosen dosen) {
        daftarDosen.add(dosen);
    }

    public void tambahKelas(Kelas kelas) {
        daftarKelas.add(kelas);
    }

             public void info() {
        System.out.println("Universitas: " + univ);
        System.out.println("Daftar Dosen:");
        for (Dosen dosen : daftarDosen) {
            dosen.infoD();
        }
        System.out.println("\nDaftar Kelas:");
        for (Kelas kelas : daftarKelas) {
            kelas.infoKelas();
        }
    }
}
