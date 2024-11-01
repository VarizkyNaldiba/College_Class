package pertemuan5.uts;

public class Mahasiswa {
    private String nama;
    private String nim;

    // Constructor Mahasiswa
    public Mahasiswa(String nama, String nim) {
        this.nama = nama;
        this.nim = nim;
    }

    // Getter dan setter untuk nama
    public String getNama() {
        return nama;
    }
 
    public void setNama(String nama) {
        this.nama = nama;
    }

    // Getter dan setter untuk NIM
    public String getNim() {
        return nim;
    }

    public void setNim(String nim) {
        this.nim = nim;
    }

    // Method untuk menampilkan informasi mahasiswa
    public void infoMhs() {
        System.out.printf("Nama Mahasiswa: %s\n", nama);
        System.out.printf("NIM: %s\n", nim);
    }
}
