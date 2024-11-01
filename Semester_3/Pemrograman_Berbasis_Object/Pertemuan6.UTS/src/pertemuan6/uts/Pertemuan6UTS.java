package pertemuan6.uts;

public class Pertemuan6UTS {
    public static void main(String[] args) {
        // Membuat objek DaftarGaji
        DaftarGaji daftarGaji = new DaftarGaji();

        // Membuat beberapa objek Pegawai dan Dosen
        Pegawai pegawai1 = new Pegawai("12345", "Budi", "Jakarta");
        Pegawai pegawai2 = new Pegawai("67890", "Siti", "Surabaya");
        Dosen dosen1 = new Dosen("23456", "Ahmad", "Malang", 12, 150000); // 12 SKS x 150000
        Dosen dosen2 = new Dosen("78901", "Rahmat", "Bandung", 10, 160000); // 10 SKS x 160000

        // Menambahkan pegawai dan dosen ke daftar gaji
        daftarGaji.addPegawai(pegawai1);
        daftarGaji.addPegawai(pegawai2);
        daftarGaji.addPegawai(dosen1);
        daftarGaji.addPegawai(dosen2);

        // Menampilkan semua gaji pegawai dan dosen
        daftarGaji.printSemuaGaji();
    }
}
