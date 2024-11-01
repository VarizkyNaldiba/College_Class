package Case2_OverRding;

public class Manejer {

    protected String nama;
    protected int gaji;

    public Manejer(String nama, int gaji) {
        this.nama = nama;
        this.gaji = gaji;
    }
    public void naikkanGaji() {
        gaji += 100000;
    }

    public void cetakStatus() {
        System.out.println("Nama : " + nama );
        System.out.println("Gaji : " + gaji );
    }

}
