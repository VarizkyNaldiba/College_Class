package pertemuan6.uts;

import java.util.ArrayList;

public class DaftarGaji {
    private ArrayList<Pegawai> listPegawai;

    // Constructor untuk DaftarGaji
    public DaftarGaji() {
        listPegawai = new ArrayList<>();
    }

    // Method untuk menambahkan pegawai ke daftar gaji
    public void addPegawai(Pegawai pegawai) {
        listPegawai.add(pegawai);
    }

    // Method untuk mencetak semua gaji pegawai yang ada dalam daftar
    public void printSemuaGaji() {
        for (Pegawai pegawai : listPegawai) {
            System.out.println("Nama: " + pegawai.getNama() + ", Gaji: " + pegawai.getGaji());
        }
    }
}
 