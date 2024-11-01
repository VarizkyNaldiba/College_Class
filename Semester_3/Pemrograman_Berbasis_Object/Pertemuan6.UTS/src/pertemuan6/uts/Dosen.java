package pertemuan6.uts;

public class Dosen extends Pegawai {
    public int jumlahSKS;
    public int Tarif_SKS;

    public Dosen(String nip, String nama, String alamat, int jumlahSKS, int Tarif_SKS) {
        super(nip, nama, alamat);
        this.jumlahSKS = jumlahSKS;
        this.Tarif_SKS = Tarif_SKS;
    }

    public int getGaji() {
        return jumlahSKS * Tarif_SKS;  // Menghitung gaji dosen berdasarkan SKS
    }
}
