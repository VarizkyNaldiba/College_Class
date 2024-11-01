package pertemuan6.uts;

public class Pegawai {
    public String nip, nama, alamat;

    public Pegawai(String nip, String nama, String alamat) {
        this.nip = nip;
        this.nama = nama;
        this.alamat = alamat;
    }

    public String getNama() {
        return nama;
    }

    public int getGaji() {
        return 3000000; // Misalnya gaji pegawai default adalah 3 juta
    }
}
