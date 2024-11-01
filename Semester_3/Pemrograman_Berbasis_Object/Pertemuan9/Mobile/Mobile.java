package Mobile;

public class Mobile {
    public int berat;

    public Mobile(int berat) {
        this.berat = berat;
    }

    public String deteksiPerangkat() {
        return "Jenis perangkat tidak diketahui.";
    }

    public int isMobile() {
        if (berat < 4) {
            System.out.println("Perangkat ini Mobile");
        } else {
            System.out.println("Perangkat ini bukan Mobile");
        }
        return berat;
    }
}
