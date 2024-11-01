package pertemuan7;

public class staff extends karyawan {
    public int lembur, potongan;

    public staff(String nama, String alamat, String jk, int umur, int gaji, int lembur, int potongan) {
        super(nama, alamat, jk, umur, gaji);
        this.lembur = lembur;
        this.potongan = potongan;
    }

    public void infoStaff() {
        super.info();
        System.out.println("Lembur = " + lembur);
        System.out.println("Potongan = " + potongan);
        System.out.println("Total Gaji = " + (gaji + lembur - potongan));
    }   
}

