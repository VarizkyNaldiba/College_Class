package Mobile;

public class Mobile {
    public int berat;

    public Mobile() {
    }
    
    public Mobile(int berat) {
        this.berat = berat;
    }

    // Metode untuk menentukan apakah perangkat ini mobile atau bukan
    public boolean isMobile() {
        if (berat < 4) {
            System.out.println("Perangkat ini Mobile (berat di bawah 4)");
            return true;
        } else {
            System.out.println("Perangkat ini bukan Mobile (berat 4 atau lebih)");
            return false;
        }
    }

    public void info() {
        System.out.println("Berat : " + berat + " Kg" );
    }
}
