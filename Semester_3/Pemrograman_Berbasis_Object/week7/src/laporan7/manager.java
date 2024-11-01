package laporan7;

public class manager extends karyawan{
    public int tunjangan;

    public manager() {
       
    }
    
 
    public void infoManager() {
        super.info();
        System.out.println("Tunjangan = " + tunjangan);
        System.out.println("Total Gaji = " + (super.gaji + tunjangan));

    }
}

