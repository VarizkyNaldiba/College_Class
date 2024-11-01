package pertemuan5.uts;

public class Pertemuan5UTS {
    public static void main(String[] args) {
        // Membuat objek Dosen
        Dosen dos1 = new Dosen("Varizky", "2341720243");
        Dosen dos2 = new Dosen("Rahmat", "2341720245");
        
        // Membuat objek Mahasiswa
        Mahasiswa mhs1 = new Mahasiswa("Ahmad", "1941720012");
        Mahasiswa mhs2 = new Mahasiswa("Budi", "1941720013");
        Mahasiswa mhs3 = new Mahasiswa("Citra", "1941720014");
        
        // Membuat objek Kelas dan menambah mahasiswa ke kelas
        Kelas kelas1 = new Kelas("TI-2A", dos1);
        kelas1.tambahMahasiswa(mhs1);
        kelas1.tambahMahasiswa(mhs2);
        
        Kelas kelas2 = new Kelas("TI-2B", dos2);
        kelas2.tambahMahasiswa(mhs3);
           
        // Menambahkan kelas ke dosen
        dos1.tambahKelas(kelas1);
        dos2.tambahKelas(kelas2);

        // Membuat objek Kampus
        Kampus malang = new Kampus("Polinema");
        
        // Menambah dosen dan kelas ke kampus
        malang.tambahDosen(dos1);
        malang.tambahDosen(dos2);
        malang.tambahKelas(kelas1);
        malang.tambahKelas(kelas2);
        
        // Menampilkan informasi kampus, dosen, dan kelas
        malang.info();
    }
}
