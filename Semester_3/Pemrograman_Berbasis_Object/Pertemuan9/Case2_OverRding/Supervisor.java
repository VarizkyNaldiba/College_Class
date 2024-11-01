package Case2_OverRding;

public class Supervisor extends Manejer {

    public Supervisor(String nama, int gaji) {
        super(nama, gaji);
    }

    public void naikkanGaji() {
        gaji += 1500000;
}
}
