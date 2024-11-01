package pertemuan5.uts;

import java.util.ArrayList;

public class Kelas {
    private String namaKelas;
    private Dosen dosen;  
    private ArrayList<Mahasiswa> daftarMahasiswa;  

    public Kelas(String namaKelas, Dosen dosen) {
        this.namaKelas = namaKelas;
        this.dosen = dosen;
        this.daftarMahasiswa = new ArrayList<>();
    }

    public String getNamaKelas() {
        return namaKelas;
    }

    public void setNamaKelas(String namaKelas) {
        this.namaKelas = namaKelas;
    }

    public Dosen getDosen() {
        return dosen;
    }

    public void setDosen(Dosen dosen) {
        this.dosen = dosen;
    }

    public void tambahMahasiswa(Mahasiswa mahasiswa) {
        daftarMahasiswa.add(mahasiswa);
    }

    public void infoKelas() {
        System.out.println("Kelas: " + namaKelas);
        System.out.println("Dosen Pengajar: " + dosen.getNama());
        System.out.println("Daftar Mahasiswa:");
        for (Mahasiswa mhs : daftarMahasiswa) {
            System.out.println("- " + mhs.getNama() + " (" + mhs.getNim() + ")");
        }
    }
}
